<?php

require_once '../vendor/autoload.php';
require_once 'autoloader.inc.php';
require_once 'config.inc.php';
require_once 'order.inc.php';

\Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_API_KEY']);
// Replace this endpoint secret with your endpoint's unique secret
// If you are testing with the CLI, find the secret by running 'stripe listen'
// If you are using an endpoint defined with the API or dashboard, look in your webhook settings
// at https://dashboard.stripe.com/webhooks
$endpoint_secret = 'whsec_fd10e04f0615bb078bde8fc9dcbd0c5f82ed0777ae6c56506f7da658128b12a6';

$payload = @file_get_contents('php://input');
$event = null;

try {
  $event = \Stripe\Event::constructFrom(
    json_decode($payload, true)
  );
} catch(\UnexpectedValueException $e) {
  // Invalid payload
  echo '⚠️  Webhook error while parsing basic request.';
  http_response_code(400);
  exit();
}
if ($endpoint_secret) {
  // Only verify the event if there is an endpoint secret defined
  // Otherwise use the basic decoded event
  $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
  try {
    $event = \Stripe\Webhook::constructEvent(
      $payload, $sig_header, $endpoint_secret
    );
  } catch(\Stripe\Exception\SignatureVerificationException $e) {
    // Invalid signature
    echo '⚠️  Webhook error while validating signature.';
    http_response_code(400);
    exit();
  }
}
//file_put_contents('../response.txt', $event);
function handlePaymentIntentSucceeded($sesh_obj) {
    if($sesh_obj->status !== 'complete') return;

    $stripe = new \Stripe\StripeClient($_ENV['STRIPE_SECRET_API_KEY']);
    $items = $stripe->checkout->sessions->allLineItems($sesh_obj->id)->data;

    createOrder($sesh_obj, $items);

    file_put_contents('../response.txt', $sesh_obj);
}

// Handle the event
switch ($event->data->object->object) {
  case 'checkout.session':
    $sess_obj = $event->data->object; 

    handlePaymentIntentSucceeded($sess_obj);
    break;
  case 'payment_method.attached':
    $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
    // Then define and call a method to handle the successful attachment of a PaymentMethod.
    //handlePaymentMethodAttached($paymentMethod);
    break;
  default:
    // Unexpected event type
    error_log('Received unknown event type');
}

http_response_code(200);