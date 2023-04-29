<?php

if (isset($_POST['signup']) && is_numeric($_POST['signup'])) {

    $email =        $_POST['email'];
    $pwd =          $_POST['password'];
    $pwdVerify =    $_POST['verify-password'];
    $time_created = date(  'Y-m-d H:i:s');

    include_once 'autoloader.inc.php';

    $user = new UserContr($email, $pwd, $pwdVerify, $time_created);

    $userId = $user->signUp();

    session_start();
    $_SESSION['user_id'] = $userId;

    header('Location: ../?msg=accountcreated');

}
