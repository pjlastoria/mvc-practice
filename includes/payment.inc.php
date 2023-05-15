<?php
require_once 'autoloader.inc.php';
include_once 'config.inc.php';

$stripe = new \Stripe\StripeClient($_ENV['STRIPE_SECRET_API_KEY']);

session_start();

function calculateOrderAmount(array $items): int
{
    $amount = 0;

    foreach ($items as $item) {
        $amount += intval($item['price']);
    }

    return $amount * 100; //stripe seems to not like decimals so be sure to multiply any prices or totals by 100
}

header('Content-Type: application/json');

try {

    $cart = array_values($_SESSION['cart']);

    function cartToStripeLineItems($item)
    {
        return [
            'price' => $item['stripe_price_id'],
            'quantity' => $item['qty'],
        ];
    }

    $line_items = array_map('cartToStripeLineItems', $cart);

    $stripe->checkout->sessions->create([
        'success_url' => 'http://localhost/giaware/payment-successful',
        'line_items' => $line_items,
        'customer_email' => $_SESSION['user']['email'],
        'mode' => 'payment',
    ]);

    $paymentIntent = $stripe->paymentIntents->create(
        ['amount' => calculateOrderAmount($_SESSION['cart']), 'currency' => 'usd', 'payment_method_types' => ['card']]
      );
    // Create a PaymentIntent with amount and currency
    

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
