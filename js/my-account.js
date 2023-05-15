/**REMOVE PROUDCT FROM WISHLIST**/
let wishCards = document.getElementsByClassName('wish-card');
wishCards = [].slice.call(wishCards);

let removeFromWishListBtns = document.getElementsByClassName('remove-from-wishlist');
removeFromWishListBtns = [].slice.call(removeFromWishListBtns);

let wishQtyIcon = document.getElementsByClassName('wish-qty')[0];

state['wishQty'] = parseInt(wishQtyIcon.innerText);

removeFromWishListBtns.forEach(btn => {
    btn.addEventListener('click', ajaxRemoveFromWishList);
});

function ajaxRemoveFromWishList(e) {
    
    let productID = this.id; // this always grabs the parent whereas e.target grabs the element clicked
    let cardEle = getEle(productID);

    let params = 'remove=1&' + 'product_id=' + productID;
    let productJson;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/wishlist.inc.php");
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState == 4 && xhr.status == 200) {
            productJson = JSON.parse(xhr.responseText);
            
            if(productJson['msg']) {
                flashWishMsg(productJson['msg']);
                cardEle.remove();
                wishQtyIcon.innerText = --state['wishQty'];
                if(state['wishQty'] == 0) wishQtyIcon.classList.add('hidden');
            };
        }
    }

    xhr.send(params);

}

function getEle(productID) {
    for (let i = 0; i < wishCards.length; i++) {
        if (wishCards[i].id == productID) {
            return wishCards[i];
        }
    }
}

function flashWishMsg(msg) {
    flashMsg.innerHTML = msg;
    flashMsg.classList.add('active-msg');

    setTimeout(() => {
        flashMsg.innerHTML = '';
        flashMsg.classList.remove('active-msg');
    }, 7000);
}