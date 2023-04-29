<?php

if(!isset($_GET['id'])) {
    header('Location: catalog');
    exit();
}

include 'includes/autoloader.inc.php';

include('header.php');

include('user-nav.php');

include('search-nav.php');

include('main-nav.php');

include('side-browse.php');

include('side-cart.php');

$id = $_GET['id'];
$product_obj = new Product();
$product_data = $product_obj->getProduct($id);

/*
echo '<pre>';
var_dump($product_data);
echo '</pre>';
*/
?>

<section class="product-section">

    <div class="product-section-layout">
        <div class="layout-half">
            <div class="product-images-container">
                <div class="product-image-main">
                    <img src="product-images/<?= $product_data['image_path'] ?>" alt="">
                </div>

                <div class="image-wrapper">
                    <div class="image-slide active-image-slide">
                        <img src="product-images/<?= $product_data['image_path'] ?>" alt="">
                    </div>
                    <div class="image-slide">
                        <img src="product-images/<?= $product_data['image_path'] ?>" alt="">
                    </div>
                    <div class="image-slide">
                        <img src="product-images/<?= $product_data['image_path'] ?>" alt="">
                    </div>
                    <div class="image-slide">
                        <img src="product-images/<?= $product_data['image_path'] ?>" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="layout-half">
            <div class="half-section">
                <h1><?= $product_data['name'] ?></h1>
                <span class="product-price">&#36;<?= $product_data['price'] ?></span>
            </div>
            <div class="half-section blue-bottom">
                <p class="product-description">
                    <?= $product_data['description'] ?>
                </p>
            </div>
            <div class="half-section blue-bottom">
                <span class="plans-link">See Protection Plans</span>
                <button class="add-to-cart">Add to Cart</button>
            </div>
            <div class="half-section">
                <span class="verified-text">Factory Approved</span>
                <span class="policy-text">Return Policy</span>
            </div>
            <h4>Condition</h4>
            <div class="half-section">
                <span class="product-condition 
                    <?= ($product_data['condition'] ==    'OK') ? 'active-condition' : '' ?>">OK
                </span>
                <span class="product-condition 
                    <?= ($product_data['condition'] ==  'Good') ? 'active-condition' : '' ?>">Good
                </span>
                <span class="product-condition 
                    <?= ($product_data['condition'] == 'Great') ? 'active-condition' : '' ?>">Great
                </span>
            </div>
            <h4>Accessories</h4>
            <div class="half-section">
                <span class="Accessory">None</span>
            </div>
        </div>
    </div>

</section>

<section class="recommended-products">

    <div class="recommended-container">
        <h2 class="">Customers Also Bought</h2>

        <div class="products-wrapper">
            <div class="product-card">
                <div class="product-img">
                    <img src="product-images/<?= $product_data['image_path'] ?>" alt="">
                    <div class="add-to-wishlist">
                        <img src="images/favorite-icon.svg" alt="" title="Add to Wishlist">
                    </div>
                </div>
                <ul class="product-info">
                    <li class="product-brand"><?= $product_data['brand'] ?></li>
                    <li class="product-name"><?= $product_data['name'] ?></li>
                    <li class="product-price">
                        <span class="old-price">&#36;<?= ($product_data['price'] + 15) ?></span>
                        &#36;<?= $product_data['price'] ?>
                    </li>
                </ul>
            </div>

            <div class="product-card">
                <div class="product-img">
                    <img src="product-images/<?= $product_data['image_path'] ?>" alt="">
                    <div class="add-to-wishlist">
                        <img src="images/favorite-icon.svg" alt="" title="Add to Wishlist">
                    </div>
                </div>
                <ul class="product-info">
                    <li class="product-brand"><?= $product_data['brand'] ?></li>
                    <li class="product-name"><?= $product_data['name'] ?></li>
                    <li class="product-price">
                        <span class="old-price">&#36;<?= ($product_data['price'] + 15) ?></span>
                        &#36;<?= $product_data['price'] ?>
                    </li>
                </ul>
            </div>

            <div class="product-card">
                <div class="product-img">
                    <img src="product-images/<?= $product_data['image_path'] ?>" alt="">
                    <div class="add-to-wishlist">
                        <img src="images/favorite-icon.svg" alt="" title="Add to Wishlist">
                    </div>
                </div>
                <ul class="product-info">
                    <li class="product-brand"><?= $product_data['brand'] ?></li>
                    <li class="product-name"><?= $product_data['name'] ?></li>
                    <li class="product-price">
                        <span class="old-price">&#36;<?= ($product_data['price'] + 15) ?></span>
                        &#36;<?= $product_data['price'] ?>
                    </li>
                </ul>
            </div>

            <div class="product-card">
                <div class="product-img">
                    <img src="product-images/<?= $product_data['image_path'] ?>" alt="">
                    <div class="add-to-wishlist">
                        <img src="images/favorite-icon.svg" alt="" title="Add to Wishlist">
                    </div>
                </div>
                <ul class="product-info">
                    <li class="product-brand"><?= $product_data['brand'] ?></li>
                    <li class="product-name"><?= $product_data['name'] ?></li>
                    <li class="product-price">
                        <span class="old-price">&#36;<?= ($product_data['price'] + 15) ?></span>
                        &#36;<?= $product_data['price'] ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</section>

<script src="js/main.js"></script>
<script src="js/product.js"></script>
<script src="js/side-cart.js"></script>
<?php include('footer.php'); ?>