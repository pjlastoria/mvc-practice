<?php

function createOrder($stripe_sesh, $items) {

    $sesh_id = $stripe_sesh->metadata->sessionID;
    $user_id = intval(  $stripe_sesh->metadata->userID);
    $total =   floatval($stripe_sesh->amount_total/100);
    
    $now        = strtotime('-6 hour'); //EST timezone
    $timestamp  = date("Y-m-d H:i:s", $now);

    include_once 'autoloader.inc.php';

    $order = new OrderContr($user_id, $sesh_id, $total, $timestamp, $stripe_sesh->id);

    $order_id = intval($order->addOrder());
    
    foreach($items as $item) {

        $order_item = new OrderItemContr($item->price->id, $order_id, $item->id, $timestamp);
        $order_item->saveItem();

    }
    
    //saveItems($orderId, $items);
}


function saveItems($orderId, $stripe_sesh_items) {



}