/**REMOVE PROUDCT FROM WISHLIST**/

let removeFromWishListBtns = document.getElementsByClassName('remove-from-wishlist');
removeFromWishListBtns = [].slice.call(removeFromWishListBtns);

removeFromWishListBtns.forEach(btn => {
    btn.addEventListener('click', ajaxRemoveFromWishList);
});

function ajaxRemoveFromWishList(e) {

    let productID = this.id; // this always grabs the parent whereas e.target grabs the element clicked
    let params = 'remove=1&' + 'product_id=' + productID;
    let productJson;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/wishlist.inc.php");
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState == 4 && xhr.status == 200) {
            productJson = xhr.responseText;
            console.log(productID);

            //if(productJson['msg']) flashWishMsg(productJson['msg']);
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