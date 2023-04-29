<?php
    $curr_page = basename($_SERVER["REQUEST_URI"]);
?>

<nav class="search-nav">
    <div class="logo-wrapper">
        <a href="/giaware">
            <img src="images/logo-placeholder.jpg" alt="" class="logo">
        </a>
    </div>
</nav>

<nav class="main-nav">
    <ul class="checkout-progress">
        
        <li class="<?= ($curr_page == 'cart') ?           'active' : null ?>">
            <a href="cart">Check Cart</a>
        </li>

        <img src="images/right-arrow-white.svg" alt="">

        <li class="<?= ($curr_page == 'account-verify') ? 'active' : null ?>"> 
            <a href="account-verify">Verify Account</a> 
        </li>

        <img src="images/right-arrow-white.svg" alt="">

        <li class="<?= ($curr_page == 'shipping') ?       'active' : null ?>">
            <a href="shipping">Shipping</a>
        </li>

        <img src="images/right-arrow-white.svg" alt="">

        <li class="<?= ($curr_page == 'payment') ?        'active' : null ?>">
            <a href="payment">Payment</a>
        </li>
    </ul>
</nav>