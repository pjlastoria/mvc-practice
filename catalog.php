<?php

include('header.php');

include('user-nav.php');

include('search-nav.php');

include('main-nav.php');

include('side-browse.php');

include('side-cart.php');

include('product-api.php');

/*
echo '<pre>';
var_dump($product_data);
echo '</pre>';
*/

function catalog_grid_template($products)
{

    foreach ($products as $product) {

        $old_price = $product['price'] + 15;

        $product_element = <<<EOT
            <div class="product-card" id="{$product['id']}">
                <div class="product-img">
                    <img src="product-images/{$product['image_path']}" alt="">
                    <div class="add-to-wishlist">
                        <img src="images/favorite-icon.svg" alt="" title="Add to Wishlist">
                    </div>
                </div>
                <div class="product-text">
                    <h4 class="product-name">{$product['name']} {$product['category']}</h4>
                    <p class="product-description">
                        {$product['description']}
                    </p>
                </div>
                <ul class="product-info">
                    <li class="product-brand">{$product['brand']}</li>
                    <li class="product-name">{$product['name']}</li>
                    <li class="product-price"><span class="old-price">&#36;{$old_price}</span>&#36;{$product['price']}</li>
                    <button id="{$product['id']}" class="add-to-cart">
                        Add to Cart
                    </button>
                    <div id="{$product['id']}" class="add-to-wishlist">
                        <img src="images/favorite-icon.svg" alt="" title="Add to Wishlist">
                    </div>
                </ul>
            </div>
        EOT;

        echo $product_element;
    }
}

?>

<section class="catalog-section">
    <div class="catalog-nav">
        <h1>Catalog</h1>

        <div class="catalog-nav-right">
            <img class="catalog-layout active-layout" src="images/columns-icon.svg" alt="" title="columns">
            <img class="catalog-layout" src="images/rows-icon.svg" alt="" title="rows">
            <select name="catalog-order">
                <option value="order-by">Order By</option>
                <option value="popularity">Most Popular</option>
                <option value="rating">Highest Rated</option>
            </select>
        </div>
    </div>

    <div class="catalog-layout">
        <div class="catalog-side-nav">

            <div class="nav-tab">
                <div class="tab-heading">
                    <h4 class="tab-header">Category</h4>
                    <img src="images/right-arrow.svg" alt="" class="tab-arrow">
                </div>

                <div class="tab-options">
                    <div class="catalog-filter">
                        <input type="checkbox" id="all" name="category" value="all" <?= ($key !== 'category') ? 'checked' : '' ?>>
                        <label for="all-categories">All</label><br>
                    </div>
                    <div class="catalog-filter">
                        <input type="checkbox" id="console" name="category" value="Console" <?= ($key == 'category' && $val == 'console') ? 'checked' : '' ?>>
                        <label for="console">Console</label><br>
                    </div>
                    <div class="catalog-filter">
                        <input type="checkbox" id="controller" name="category" value="Controller" <?= ($key == 'category' && $val == 'controller') ? 'checked' : '' ?>>
                        <label for="controller">Controller</label><br>
                    </div>
                    <div class="catalog-filter">
                        <input type="checkbox" id="hardware" name="category" value="Hardware" <?= ($key == 'category' && $val == 'hardware') ? 'checked' : '' ?>>
                        <label for="hardware">Hardware</label><br>
                    </div>
                </div>
            </div>
            <div class="nav-tab">
                <div class="tab-heading">
                    <h4 class="tab-header">Price Range</h4>
                    <img src="images/right-arrow.svg" alt="" class="tab-arrow">
                </div>

                <div class="tab-options">
                    <div class="catalog-filter">
                        <input type="checkbox" id="all" name="price" value="all"  <?= ($key !== 'price') ? 'checked' : '' ?>>
                        <label for="all-prices">All</label><br>
                    </div>
                    <div class="catalog-filter">
                        <input type="checkbox" id="low" name="price" value="low" <?= ($key == 'price' && $val == 'low') ? 'checked' : '' ?>>
                        <label for="low">$0 - $24</label><br>
                    </div>
                    <div class="catalog-filter">
                        <input type="checkbox" id="medium" name="price" value="medium" <?= ($key == 'price' && $val == 'medium') ? 'checked' : '' ?>>
                        <label for="medium">$25 - $99</label><br>
                    </div>
                    <div class="catalog-filter">
                        <input type="checkbox" id="high" name="price" value="high" <?= ($key == 'price' && $val == 'high') ? 'checked' : '' ?>>
                        <label for="high">$100+</label><br>
                    </div>
                </div>

            </div>
            <div class="nav-tab">
                <div class="tab-heading">
                    <h4 class="tab-header">Brand</h4>
                    <img src="images/right-arrow.svg" alt="" class="tab-arrow">
                </div>

                <div class="tab-options">
                    <div class="catalog-filter">
                        <input type="checkbox" id="all" name="brand" value="all" <?= ($key !== 'brand') ? 'checked' : '' ?>>
                        <label for="all-brands">All</label><br>
                    </div>
                    <div class="catalog-filter">
                        <input type="checkbox" id="nintendo" name="brand" value="Nintendo" <?= ($key == 'brand' && $val == 'nintendo') ? 'checked' : '' ?>>
                        <label for="console">Nintendo</label><br>
                    </div>
                    <div class="catalog-filter">
                        <input type="checkbox" id="sony" name="brand" value="Sony" <?= ($key == 'brand' && $val == 'sony') ? 'checked' : '' ?>>
                        <label for="controller">Sony</label><br>
                    </div>
                    <div class="catalog-filter">
                        <input type="checkbox" id="sega" name="brand" value="Sega" <?= ($key == 'brand' && $val == 'sega') ? 'checked' : '' ?>>
                        <label for="hardware">Sega</label><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="catalog-grid">
            <?= catalog_grid_template($product_data) ?>
        </div>
    </div>
</section>

<script src="js/main.js"></script>
<script src="js/catalog.js"></script>
<script src="js/add-product.js"></script>
<script src="js/side-cart.js"></script>

<?php include('footer.php'); ?>