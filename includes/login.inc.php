<?php

if (isset($_POST['login']) && is_numeric($_POST['login'])) {

    $email =        $_POST['email'];
    $pwd =          $_POST['password'];
    $pwdVerify =    NULL;
    $time_created = date('Y-m-d H:i:s');

    include_once 'autoloader.inc.php';

    $user = new UserContr($email, $pwd, $pwdVerify, $time_created);

    $user_data = $user->login();

    session_start();
    $_SESSION['user']['id']    = $user_data['id'];
    $_SESSION['user']['email'] = $user_data['email'];
    $_SESSION['wish_list'] = array();

    $wish_controller = new WishContr('null', $user_data['id'], 0, 'null');
    $wish_list = $wish_controller->getUserWishList();

    foreach($wish_list as $wish) {
        $_SESSION['wish_list'][$wish['product_id']] = $wish;
    }

    if (is_numeric($_POST['checkout'])) {
        header('Location: ../shipping');
        exit();
    }

    header('Location: ../?msg=loginsuccessful');

}
