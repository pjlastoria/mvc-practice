<?php

include('header.php');

include('checkout-nav.php');
/*
echo '<pre>';
var_dump($_SESSION['cart']);
echo '</pre>';
*/

function cart_item_template($items)
{

    foreach ($items as $item) {

        // render select options with the correct qty
        for ($i = 1, $options = ''; $i <= 5; $i++) {

            $selected = ($item['qty'] == $i) ? 'selected' : '';
            $options .= '<option value="' . $i . '"' . $selected . '>' . $i . '</option>';
        }

        $item_ele = <<<EOT
            <li id="{$item['id']}">
                <div class="item-wrapper">
                    <img src="product-images/{$item['image_path']}" alt="" class="product-medium-image">
                    <ul class="cart-item-info">
                        <li class="item-name">{$item['brand']} {$item['name']}</li>
                        <li class="item-condition">Condition: {$item['condition']}</li>
                        <li class="item-price">&#36;{$item['price']}</li>
                    </ul>
                    <div class="item-qty-ctrl">
                        <select name="item-qty">
                            {$options}
                        </select>
                        <button class="remove-btn">
                            Remove
                        </button>
                    </div>
                </div>
                <div class="item-protection">
                    <div>
                        <input type="checkbox" name="protection-plan" id="protection-plan">
                        <label for="protection-plan">Protection Plan - $9.99 One Time Fee</label>
                    </div>
                    <ul class="protection-list">
                        <li><img src="images/checkmark.svg" alt="">Accidental damage protection for drops, spills, and cracked screens</li>
                        <li><img src="images/checkmark.svg" alt="">Hardware coverage for mechanical and electrical failures</li>
                        <li><img src="images/checkmark.svg" alt="">Power surge coverage for damages caused by power fluctuations</li>
                        <li><img src="images/checkmark.svg" alt="">24/7 customer support for all your protection plan needs</li>
                        <li><img src="images/checkmark.svg" alt="">Convenient online claims process for fast and easy service</li>
                        <li><img src="images/checkmark.svg" alt="">Coverage for up to 12 months from the date of purchase</li>
                        <li><img src="images/checkmark.svg" alt="">Transferable coverage for added value and flexibility</li>
                        <li><img src="images/checkmark.svg" alt="">No deductibles or hidden fees</li>
                    </ul>
                </div>
            </li>
        EOT;

        echo $item_ele;
    }
}
?>

<section class="cart-section">

    <div class="cart-container">
        <h3 class="cart-heading">Your Cart</h3>

        <div class="cart">
            <ul class="cart-items">

                <?php

                if (!empty($_SESSION['cart']) && isset($_SESSION['cart'])) {

                    cart_item_template($_SESSION['cart']);
                } else {

                ?>

                    <li id="empty-cart">
                        <p>
                            Looks like your cart is empty,</br>
                            feel free to browse our products below.
                        </p>
                        <a href="catalog">
                            <button>Catalog</button>
                        </a>
                    </li>

                <?php

                }

                ?>

            </ul>

        </div>
    </div>

    <?php

    if (!empty($_SESSION['cart']) && isset($_SESSION['cart'])) {

    ?>

        <div class="summary-container">
            <h3 class="summary-heading">Summary</h3>
            <div class="summary">
                <ul class="summary-items">
                    <li class="item-container" id="349875">
                        <img src="product-images/dreamcast-console.jpg" alt="" class="product-thumbnail">
                        <ul class="item-info">
                            <li>
                                <span class="item-info-name">Sega Dreamcast</span>
                                <span class="item-info-price">$19</span>
                            </li>
                            <li>
                                <span class="item-info-name">Shipping</span>
                                <span class="item-info-price">Free</span>
                            </li>
                            <li>
                                <span class="item-info-name">Protection</span>
                                <span class="item-info-price">$3.99</span>
                            </li>
                        </ul>
                    </li>
                    <li class="item-container" id="349875">
                        <img src="product-images/dreamcast-console.jpg" alt="" class="product-thumbnail">
                        <ul class="item-info">
                            <li>
                                <span class="item-info-name">Sega Dreamcast</span>
                                <span class="item-info-price">$19</span>
                            </li>
                            <li>
                                <span class="item-info-name">Shipping</span>
                                <span class="item-info-price">Free</span>
                            </li>
                            <li>
                                <span class="item-info-name">Protection</span>
                                <span class="item-info-price">$3.99</span>
                            </li>
                        </ul>
                    </li>
                    <li class="item-container" id="349875">
                        <img src="product-images/dreamcast-console.jpg" alt="" class="product-thumbnail">
                        <ul class="item-info">
                            <li>
                                <span class="item-info-name">Sega Dreamcast</span>
                                <span class="item-info-price">$19</span>
                            </li>
                            <li>
                                <span class="item-info-name">Shipping</span>
                                <span class="item-info-price">Free</span>
                            </li>
                            <li>
                                <span class="item-info-name">Protection</span>
                                <span class="item-info-price">$3.99</span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="item-info subtotal-wrapper">
                            <li>
                                <span class="item-info-name">Subtotal</span>
                                <span class="item-info-price">$109.77</span>
                            </li>
                            <li>
                                <span class="item-info-name">Shipping Fee</span>
                                <span class="item-info-price">$4.99</span>
                            </li>
                            <li>
                                <span class="item-info-name">Estimated Tax</span>
                                <span class="item-info-price">$3.14</span>
                            </li>
                        </ul>
                    </li>
                    <li class="total-container">
                        <span class="item-info-name">Total</span>
                        <span class="item-info-price">$300.14</span>
                    </li>
                </ul>


                <button class="summary-btn">
                    Checkout
                </button>
            </div>
        </div>

    <?php } ?>

</section>