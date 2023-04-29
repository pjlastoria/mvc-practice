<?php

include('header.php');

if (isset($_SESSION['user_id'])) {
    header('Location: /giaware');
}

?>

<section class="account-verify-section">

    <div class="account-container">
        <div class="login-form">
            <h3 class="account-heading">Create an Account</h3>
            <form action="includes/signup.inc.php" method="post">
                <input type="hidden" name="signup" value="1">

                <div class="input-row">
                    <div class="input-wrapper">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Enter Email">
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-wrapper">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter Password">
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-wrapper">
                        <label for="verify-password">Verify Password</label>
                        <input type="password" name="verify-password" placeholder="Repeat Password">
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-wrapper submit-btn">
                        <input type="submit" value="Create Account">
                    </div>
                </div>
            </form>

            <div class="create-account-link">
                Already a member? <a href="login">Login here.</a>
            </div>
        </div>
    </div>
</section>