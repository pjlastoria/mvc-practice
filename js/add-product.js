/**ADD PROUDCT TO CART**/

let addToCartBtns = document.getElementsByClassName('add-to-cart');
addToCartBtns = [].slice.call(addToCartBtns);

let sideCartList = document.getElementsByClassName('side-cart-items')[0];
let cartQtyIcon = document.getElementsByClassName('cart-qty')[0];

state['cartQty'] = sideCartList.children.length;

addToCartBtns.forEach(btn => {
    btn.addEventListener('click', showSpinner);
});

function showCartQty() {
    cartQtyIcon.innerHTML = ++state['cartQty'];
    cartQtyIcon.classList.remove("hidden"); 
}

function showSpinner(e) {
    this.disabled = 'true';
    let btnTxt = this.children[1];
    let spinner = this.children[0];
    spinner.style.display = 'block';
    btnTxt.style.display = 'none';
    ajaxAddProductToCart(this);
}

function hideSpinner(ele) {
    setTimeout(() => {
        ele.children[0].style.display = '';
        ele.children[1].style.display = '';
        ele.disabled = '';
        showCartQty();
    }, 2000);
}

function ajaxAddProductToCart(ele) {
    
    let productID = ele.id;
    let params = 'new=1&' + 'product_id=' + productID;
    let productJson;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/cart-session.inc.php");
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState == 4 && xhr.status == 200) {
            productJson = JSON.parse(xhr.responseText);
            createCartView(productJson);
            hideSpinner(ele);
        }
    }

    xhr.send(params);
}

/**ADD PROUDCT TO WISHLIST**/

let addToWishListBtns = document.getElementsByClassName('add-to-wishlist');
addToWishListBtns = [].slice.call(addToWishListBtns);

let wishQtyIcon = document.getElementsByClassName('wish-qty')[0];

if(wishQtyIcon) {
    state['wishQty'] = parseInt(wishQtyIcon.innerText);
}

addToWishListBtns.forEach(btn => {
    btn.addEventListener('click', ajaxAddProductToWishList);
});

function showWishQty() {
    wishQtyIcon.innerText = ++state['wishQty'];
    wishQtyIcon.classList.remove("hidden"); 
}

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

            if(productJson['msg']) return flashWishMsg(productJson['msg']);
            state['WishQty']++;
            showWishQty();
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