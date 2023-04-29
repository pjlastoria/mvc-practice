<nav class="search-nav">
    <div class="logo-wrapper">
        <a href="/giaware">
            <img src="images/logo-placeholder.jpg" alt="" class="logo">
        </a>
    </div>

    <div class="right">
        <div class="search-wrapper">
            <form action="includes/search.inc.php" method="post">
                <input type="hidden" name="search" value="1">
                <div class="search-categories">
                    <select name="search-select">
                        <option value="all">Searches</option>
                        <option value="console">Consoles</option>
                        <option value="controller">Controllers</option>
                        <option value="game">Games</option>
                        <option value="hardware">Accessories</option>
                    </select>

                    <input type="text" name="search-text" placeholder="Enter your query...">
                    <input type="submit" value="Search">
                </div>
            </form>
        </div>

        <?php if ($userEmail == 'Guest') { ?>

            <div class="nav-gap"></div>

        <?php } else { ?>

            <a href="my-account?tab=wishlist">
                <div class="wish-list nav-hover">
                    <img src="images/favorite-icon.svg" alt="" class="top-icon">
                    <span class="wish-qty nav-qty">99</span>
                    Wishlist
                </div>
            </a>

        <?php } ?>

        <div class="nav-cart nav-hover">
            <img src="images/shopping-cart-icon.svg" alt="" class="top-icon">
            <span class="cart-qty nav-qty">99</span>
            My Cart
        </div>
    </div>
</nav>