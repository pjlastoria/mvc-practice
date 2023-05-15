<?php

session_start();

$cart = array_values($_SESSION['cart']);

function cartToStripeLineItems($item)
{
    return [
        'price' => $item['stripe_price_id'],
        'quantity' => $item['qty'],
    ];
}

$line_items = array_map('cartToStripeLineItems', $cart);

echo json_encode($line_items);