function createCartView(productJson) {

    sideCartList.innerHTML = '';//clear cart list

    Object.values(productJson).forEach(product => {

        let liParent = document.createElement("li");
        liParent.id = product['id'];

        let productImg = document.createElement("img");
        productImg.className = 'product-thumbnail';
        productImg.src = 'product-images/' + product['image_path'];

        let productName = document.createElement("span");
        productName.className = 'side-cart-item-name';
        productName.title = product['name'];
        productName.innerHTML = product['name'];

        let qty = document.createElement("span");
        qty.className = 'side-cart-item-qty';
        qty.innerHTML = 'X' + product['qty'];

        liParent.append(productImg);
        liParent.append(productName);
        liParent.append(qty);

        sideCartList.appendChild(liParent);

    });
}