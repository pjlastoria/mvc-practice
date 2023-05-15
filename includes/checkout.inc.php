<?php

if (isset($_POST['user_id']) && is_numeric($_POST['user_id'])) {

    require_once 'autoloader.inc.php';
    include_once 'config.inc.php';
    session_start();

    $stripe = new \Stripe\StripeClient($_ENV['STRIPE_SECRET_API_KEY']);

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

    $stripe_session = $stripe->checkout->sessions->create([
        'success_url' => 'http://localhost/giaware/payment-successful',
        'line_items' => $line_items,
        'customer_email' => $_SESSION['user']['email'],
        'mode' => 'payment',
        'metadata' => [
            'userID' => intval($_SESSION['user']['id']),
            'sessionID' => session_id()
        ]
    ]);


    header('Location: ' . $stripe_session->url);

    
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}

}
