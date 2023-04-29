<?php

include_once 'includes/autoloader.inc.php';

$product_obj = new Product();
$product_data = $product_obj->getAllProducts();

function carousel_card_template($products)
{
    $ind = 0;

    foreach ($products as $product) {
        if(++$ind > 10) break;

        $old_price = $product['price'] + 15;

            $product_element = <<<EOT
                <div class="carousel-card">
                    <div class="carousel-img">
                        <img src="product-images/{$product['image_path']}" alt="">
                        <div id="{$product['id']}" class="add-to-wishlist">
                            <img src="images/favorite-icon.svg" alt="" title="Add to Wishlist">
                        </div>
                    </div>
                    <ul class="carousel-text">
                        <li class="product-brand">{$product['brand']}</li>
                        <li class="product-name">{$product['name']}</li>
                        <li class="product-price"><span class="old-price">&#36;{$old_price}</span>&#36;{$product['price']}</li>
                    </ul>
                    <button id="{$product['id']}" class="add-to-cart carousel-btn">
                        Add to Cart
                    </button>
                </div>
            EOT;

        echo $product_element;
    }
}

?>

<section class="new-arrivals">
    <div class="new-arrivals-header">
        <h2>New Arrivals</h2>
        <div class="top-divider"></div>
        <div class="carousel-arrows">
            <img src="images/left-arrow.svg" alt="" class="inactive">
            <img src="images/right-arrow.svg" alt="">
        </div>
    </div>

    <div class="carousel">
        <div class="card-wrapper">

        <?= carousel_card_template($product_data) ?>

        </div>
    </div>


</section>