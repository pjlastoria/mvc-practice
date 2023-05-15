<?php

require_once 'autoloader.inc.php';
require_once 'config.inc.php';

$stripe = new \Stripe\StripeClient($_ENV['STRIPE_SECRET_API_KEY']);

$stripe_products = $stripe->prices->all();
$product = new Product();
$price = $product->getProduct(5)['stripe_price_id'];


echo '<pre>';
var_dump($stripe->prices->retrieve(
    $price,
    []
)->unit_amount);
echo '</pre>';