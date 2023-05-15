<?php

include_once('autoloader.inc.php');

if (isset($_POST['new']) && is_numeric($_POST['new'])) {

    session_start();

    $session_id = session_id();
    $product_id = $_POST['product_id'];
    $user_id = (isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : 0;
    $status = 'Active';

    if(isset($_POST['qty'])) {
        $qty = $_POST['qty'];
    } else {
        $qty = isset($_SESSION['cart'][$product_id]) ? $_SESSION['cart'][$product_id]['qty'] + 1 : 1 ;
    }


    $now        = strtotime('-6 hour'); //EST timezone
    $timestamp  = date("Y-m-d H:i:s", $now);

    $cart_item = new CartItemContr($session_id, $product_id, $qty, $timestamp);

    if(!isset($_SESSION['cart'])) { //if user has a cart
        $cart = new CartContr($session_id, $user_id, $status, $timestamp);
        $cart->create();
    }

    if(isset($_SESSION['cart'][$product_id])) { //if selected product is in cart

        $cart_item->updateQty($session_id, $product_id, $qty);
        $_SESSION['cart'][$product_id]['qty'] = $qty;

    } else {

        $cart_item->saveItem($product_id, $qty);
        $_SESSION['cart'][$product_id] = $cart_item->getProduct();
        $_SESSION['cart'][$product_id]['qty'] = $qty;

    }

    echo json_encode($_SESSION['cart']);

}

if (isset($_POST['remove']) && is_numeric($_POST['remove'])) {

    session_start();

    $session_id = session_id();
    $product_id = intval($_POST['product_id']);
    $qty = 0;

    $now        = strtotime('-6 hour'); //EST timezone
    $timestamp  = date("Y-m-d H:i:s", $now);

    $cart_item = new CartItemContr($session_id, $product_id, $qty, $timestamp);

    $cart_item->removeItem();

    unset($_SESSION['cart'][$product_id]);
    echo json_encode(['msg' => 'Item removed.']);
}