/**ADD PROUDCT TO CART**/

let addToCartBtns = document.getElementsByClassName('add-to-cart');
addToCartBtns = [].slice.call(addToCartBtns);

let sideCartList = document.getElementsByClassName('side-cart-items')[0];

addToCartBtns.forEach(btn => {
    btn.addEventListener('click', ajaxAddProductToCart)
});

function ajaxAddProductToCart(e) {

    let productID = e.target.id;
    let params = 'new=1&' + 'product_id=' + productID;
    let productJson;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/cart-session.inc.php");
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState == 4 && xhr.status == 200) {
            productJson = JSON.parse(xhr.responseText);
            createCartView(productJson);
        }
    }

    xhr.send(params);

}

/**ADD PROUDCT TO WISHLIST**/

let addToWishListBtns = document.getElementsByClassName('add-to-wishlist');
addToWishListBtns = [].slice.call(addToWishListBtns);

addToWishListBtns.forEach(btn => {
    btn.addEventListener('click', ajaxAddProductToWishList);
});

function ajaxAddProductToWishList(e) {

    let productID = this.id; // this always grabs the parent whereas e.target grabs the element clicked
    let params = 'new=1&' + 'product_id=' + productID;
    let productJson;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/wishlist.inc.php");
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState == 4 && xhr.status == 200) {
            productJson = JSON.parse(xhr.responseText);
            if(productJson['msg'] == 'notloggedin') {
                window.location.replace("http://localhost/giaware/login?error=mustlogin");
                return;
            };

            if(productJson['msg']) flashWishMsg(productJson['msg']);
        }
    }

    xhr.send(params);

}

function flashWishMsg(msg) {
    flashMsg.innerHTML = msg;
    flashMsg.classList.add('active-msg');

    setTimeout(() => {
        flashMsg.innerHTML = '';
        flashMsg.classList.remove('active-msg');
    }, 7000);
}