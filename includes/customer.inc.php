<?php

include_once('autoloader.inc.php');

if (isset($_POST['user_id']) && is_numeric($_POST['user_id'])) {

    $user_id =    $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name =  $_POST['last_name'];
    $address_1 =  $_POST['address_1'];
    $address_2 =  $_POST['address_2'];
    $city =       $_POST['city'];
    $state =      $_POST['state'];
    $zip_code =   $_POST['zip_code'];
    $phone =      $_POST['phone'];

    $now        = strtotime('-6 hour'); //EST timezone
    $timestamp  = date("Y-m-d H:i:s", $now);

    $customer = new CustomerContr($user_id,$first_name,$last_name,$address_1,$address_2,$city,$state,$zip_code,$phone,$timestamp);

    $customerID = $customer->saveCustomer();
    
    //echo json_encode($customerID);
    if(!is_numeric($customerID)) {
        header('Location: ../shipping?error=queryfailed');
        exit();
    }

    session_start();
    $_SESSION['address'] = $address_1;
    
    header('Location: ../payment?customer_id=' . $customerID);
}
