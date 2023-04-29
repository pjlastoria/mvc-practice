<?php 

session_start();
if(!isset($_SESSION['cart'])) { //if user has a cart
    echo 'blah';
}
session_regenerate_id();
session_unset();
header('Location: /giaware');
//var_dump($_SESSION);

