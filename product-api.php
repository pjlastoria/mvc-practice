<?php

include 'includes/autoloader.inc.php';

$product_obj = new Product();
$product_data = $product_obj->getAllProducts();
$key = '';
$val = '';

if (isset($_GET) && count($_GET) > 0) {

    $key = key($_GET);
    $val = $_GET[$key];

    if ($key == 'category' || $key == 'brand') {

        try {
            $product_data = filter_products_by($key, $val);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    if ($key == 'price') {

        try {
            $product_data = filter_products_by_price($val);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}

function filter_products_by($key, $val)
{
    global $product_data;

    return array_filter($product_data, function ($product) use ($key, $val) { // 'use' apparently can be used in lambdas to extend scope to outside vars 
        return strtolower($product[$key]) === strtolower($val);             // since by default functions in php don't have outer scope like in JS
    });
}

function filter_products_by_price($val)
{
    global $product_data;

    return array_filter($product_data, function ($product) use ($val) {
        if($val == 'low')    return $product['price'] <  25;
        if($val == 'medium') return $product['price'] >= 25 && $product['price'] < 99;
        if($val == 'high')   return $product['price'] >= 99;
    });

}
