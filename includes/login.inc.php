<?php

if (isset($_POST['login']) && is_numeric($_POST['login'])) {

    $email =        $_POST['email'];
    $pwd =          $_POST['password'];
    $pwdVerify =    NULL;
    $time_created = date(  'Y-m-d H:i:s');

    include_once 'autoloader.inc.php';

    $user = new UserContr($email, $pwd, $pwdVerify, $time_created);

    $user_data = $user->login();

    session_start();
    $_SESSION['user_id'] = $user_data['id'];

    header('Location: ../?msg=loginsuccessful');

}
