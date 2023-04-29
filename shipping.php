<?php

include('header.php');

include('checkout-nav.php');

?>

<section class="shipping-section">

    <div class="address-container">
        <h3 class="cart-heading">Shipping Address</h3> 
        <div class="shipping-address">
            <form action="includes/address.inc.php" method="post">
                <input type="hidden" name="user_id" value="<?= 0 //$_SESSION['user_id'] 
                                                            ?>">

                <div class="input-row">
                    <div class="input-wrapper">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" placeholder="Enter First Name" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" placeholder="Enter Last Name" required>
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-wrapper">
                        <label for="address_1">Address 1</label>
                        <input type="text" name="address_1" placeholder="Enter Address" required>
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-wrapper">
                        <label for="address_2">Address 2</label>
                        <input type="text" name="address_2" placeholder="apartment #, floor #, etc.">
                    </div>
                </div>

                <div class="input-row col-3">
                    <div class="input-wrapper">
                        <label for="city">City</label>
                        <input type="text" name="city" placeholder="Enter City" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="state">State</label>
                        <select name="state">
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>

                    <div class="input-wrapper">
                        <label for="zip_code">Zip Code</label>
                        <input type="text" name="zip_code" placeholder="Enter Zip Code" required>
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-wrapper">
                        <label for="phone">Mobile Phone</label>
                        <input type="tel" name="phone" placeholder="(555) 777-1234" required>
                    </div>
                </div>

                <div class="input-submit">
                    <a href="payment">
                        <button type="submit">Payment Method</button>
                    </a>
                </div>
            </form>
        </div>
    </div>


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
            </div>
        </div>

</section>