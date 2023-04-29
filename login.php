<?php

include('header.php');

?>

<section class="account-verify-section">

    <div class="account-container">
        <div class="login-form">
            <h3 class="account-heading">Login to Your Account</h3>
            <form action="includes/login.inc.php" method="post">
                <input type="hidden" name="login" value="1">

                <div class="input-row">
                    <div class="input-wrapper">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Enter Email" required>
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-wrapper">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter Password">
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-wrapper submit-btn">
                        <input type="submit" value="Login">
                    </div>
                </div>
            </form>

            <div class="create-account-link">
                Not a member? <a href="signup">Create an account.</a>
            </div>
        </div>
    </div>
</section>