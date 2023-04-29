<?php

$userEmail = 'Guest';
if(isset($_SESSION['user_id'])) {

    include_once 'includes/autoloader.inc.php';
    $user = new User();
    $userEmail = $user->getUser($_SESSION['user_id'])['email'];

} else {
    //prevent guests from visiting account page
    (basename($_SERVER["REQUEST_URI"]) == 'my-account') ? header('Location: login?msg=mustbeloggedin') : null ;
}

?>

<nav class="user-nav">
    <div class="user-email">
        <?= $userEmail ?>
    </div>

    <div class="user-nav-right">
        <ul class="user-settings">
            <?php if($userEmail == 'Guest') { ?>

                <li><a href="login">Login</a></li>
                <li><a href="signup">Signup</a></li>

            <?php } else { ?>

                <li><a href="my-account">My Account</a></li>
                <li><a href="includes/logout.inc.php">Logout</a></li>

            <?php } ?>

            <li>USD $</li>
            <li><img src="images/flag-us.svg" alt=""><span class="translation-tab">English</span></li>
        </ul>
    </div>
</nav>