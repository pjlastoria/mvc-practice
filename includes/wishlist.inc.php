<?php

include_once('autoloader.inc.php');

if (isset($_POST['new']) && is_numeric($_POST['new'])) {

    session_start();
    if (!isset($_SESSION['user']['id'])) {
        echo json_encode(array('msg' => 'notloggedin'));
        exit();
    }

    $session_id = session_id();
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user']['id'];

    $now        = strtotime('-6 hour'); //EST timezone
    $timestamp  = date("Y-m-d H:i:s", $now);

    $wish = new WishContr($session_id, $user_id, $product_id, $timestamp);
    if ($wish->exists()) {
        echo json_encode(['msg' => 'Item is already on your wishlist.']);
        exit();
    }

    $wish->addItem();

    $_SESSION['wish_list'][$product_id] = $wish->getProduct();

    echo json_encode($_SESSION['wish_list']);
}

if (isset($_POST['remove']) && is_numeric($_POST['remove'])) {

        session_start();

        $session_id = session_id();
        $product_id = intval($_POST['product_id']);
        $user_id = intval($_SESSION['user']['id']);

        $now        = strtotime('-6 hour'); //EST timezone
        $timestamp  = date("Y-m-d H:i:s", $now);

        $wish = new WishContr('srhrth', $user_id, $product_id, $timestamp);

        $wish->removeItem();

        unset($_SESSION['wish_list'][$product_id]);
        echo json_encode(['msg' => 'Item removed.']);
}
