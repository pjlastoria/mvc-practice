<?php

require_once '../vendor/autoload.php';
require_once 'config.inc.php';

\Stripe\Stripe::setApiKey(STRIPE_SECRET_API_KEY);

session_start();

function calculateOrderAmount(array $items): int {
    $amount = 0;

    foreach($items as $item) {
        $amount += intval($item['price']);
    }

    return $amount * 100; //stripe seems to not like decimals so be sure to multiply any prices or totals by 100
}

header('Content-Type: application/json');

try {
    $items = $_SESSION['cart'];

    // Create a PaymentIntent with amount and currency
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => calculateOrderAmount($items),
        'currency' => 'usd',
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
   

} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}