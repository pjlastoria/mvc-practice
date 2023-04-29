<?php

include('header.php');

include('user-nav.php');

include('search-nav.php');

include('main-nav.php');

include('side-browse.php');

include('side-cart.php');

$tab = (isset($_GET['tab'])) ? $_GET['tab'] : '';


$wish_controller = new WishContr('null', $_SESSION['user_id'], 0, 'null');
$wish_list = $wish_controller->getUserWishList();

/*
echo '<pre>';
var_dump($wish_list);
echo '</pre>';
*/
function wishlist_template($wish_list)
{

    foreach ($wish_list as $wish) {

        $old_price = $wish['price'] + 15;

        $wish_element = <<<EOT
            <div class="product-card" id="{$wish['id']}">
                <div class="product-img">
                    <img src="product-images/{$wish['image_path']}" alt="">
                    <div id="{$wish['product_id']}" class="remove-from-wishlist">
                        <img src="images/unfavorite-icon.svg" alt="" title="Remove from Wishlist">
                    </div>
                </div>
                <ul class="product-info">
                    <li class="product-brand">{$wish['brand']}</li>
                    <li class="product-name">{$wish['name']}</li>
                    <li class="product-price"><span class="old-price">&#36;{$old_price}</span>&#36;{$wish['price']}</li>
                </ul>
            </div>
        EOT;

        echo $wish_element;
    }
}


?>

<section class="account-section">
    <div class="account-content-wrapper">
        <ul class="account-nav">
            <li>
                <a href="my-account" class="<?= ($tab == '') ?  'active' : '' ?>">My Info</a>
            </li>
            <li>
                <a href="my-account?tab=wishlist" class="<?= ($tab == 'wishlist') ? 'active' : '' ?>">Wishlist</a>
            </li>
            <li>
                <a href="my-account?tab=orders" class="<?= ($tab == 'orders') ?   'active' : '' ?>">Orders</a>
            </li>
        </ul>
        <div class="account-content">
            <div id="my-info" class="<?= ($tab == '') ?         'show' : '' ?>">my info</div>

            <div id="wishlist" class="<?= ($tab == 'wishlist') ? 'show' : '' ?>">
                <div class="catalog-grid">
                    <?= wishlist_template($wish_list) ?>
                </div>
            </div>

            <div id="orders" class="<?= ($tab == 'orders') ?   'show' : '' ?>">orders</div>
        </div>

</section>

<script src="js/main.js"></script>
<script src="js/side-cart.js"></script>
<script src="js/my-account.js"></script>

<?php

include('footer.php');

?>