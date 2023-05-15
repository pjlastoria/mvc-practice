let cartEles = document.getElementsByClassName('cart-items')[0].children;
cartEles = [].slice.call(cartEles);

let summaryEles = document.getElementsByClassName('item-container');

if (cartEles[0].id !== 'empty-cart') { //if there are cart items

    let qtySelectInputs = document.getElementsByTagName('select');
    qtySelectInputs = [].slice.call(qtySelectInputs);
    qtySelectInputs.forEach(select => {
        select.addEventListener('change', updateQty);
    });

    let removeBtns = document.getElementsByClassName('remove-btn');
    removeBtns = [].slice.call(removeBtns);
    removeBtns.forEach(btn => {
        btn.addEventListener('click', showSpinner);
    });

}

function updateQty(e) {
    let itemID =  this.id;
    let itemQty = this.value;

    updateProductQty(itemID, itemQty);
}

function showSpinner(e) {
    this.disabled = 'true';
    let btnTxt = this.children[1];
    let spinner = this.children[0];
    spinner.style.display = 'block';
    btnTxt.style.display = 'none';
    removeProductFromCart(this);
}

function hideSpinner(ele) {
    setTimeout(() => {
        ele.children[0].style.display = '';
        ele.children[1].style.display = '';
        ele.disabled = '';
        removeEle(ele.id);
    }, 2000);
}

function removeEle(id) {
    for (let i = 0; i < cartEles.length; i++) {
        if (cartEles[i].id == id) {
            cartEles[i].   remove();
        }
        if (summaryEles[i].id == id) {
            summaryEles[i].remove();
        }
    }
}

function updateQtyView(productID, qty) {

    let qtyEle = document.createElement("span");
        qtyEle.className = 'item-qty';
        qtyEle.innerHTML = qty;

    for (let i = 0; i < summaryEles.length; i++) {
        if (summaryEles[i].id == productID) {

            if (summaryEles[i].children[1].classList.contains('item-qty')) {
                summaryEles[i].children[1].innerHTML = qty;
                return;
            }
            summaryEles[i].children[0].after(qtyEle);


        }
    }
}

function updateProductQty(productID, qty) {
    
    let params = 'new=1&' + 'product_id=' + productID + '&qty=' + qty;
    let productJson;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/cart-session.inc.php");
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState == 4 && xhr.status == 200) {
            productJson = JSON.parse(xhr.responseText);
            updateQtyView(productID, qty);
        }
    }

    xhr.send(params);
}

function removeProductFromCart(ele) {
    
    let productID = ele.id;
    let params = 'remove=1&' + 'product_id=' + productID;
    let productJson;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/cart-session.inc.php");
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState == 4 && xhr.status == 200) {
            productJson = JSON.parse(xhr.responseText);
            hideSpinner(ele);
            console.log(productJson.msg);
        }
    }

    xhr.send(params);
}