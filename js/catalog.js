let sideTabs = document.getElementsByClassName('tab-heading');
sideTabs = [].slice.call(sideTabs);

let productGrid = document.getElementsByClassName('catalog-grid')[0];
let productLayoutStyle = document.getElementsByClassName('catalog-layout');
let cols = productLayoutStyle[0], rows = productLayoutStyle[1];

sideTabs.forEach(tab => {
    tab.addEventListener('click', toggleHeight);
});

cols.addEventListener('click', toggleProductLayout);
rows.addEventListener('click', toggleProductLayout);

function toggleHeight(e) {
    let tabArrow = this.children[1];
    let tabOptions = this.nextSibling.nextSibling;

    tabArrow.classList.toggle('active-arrow');
    tabOptions.classList.toggle('active-side-tab');
}

function toggleProductLayout(e) {
    if (this.classList.contains('active-layout')) return;

    toggleBtn(this);
    productGrid.classList.toggle('rows');
}

function toggleBtn(clicked) {
    clicked == rows ? cols.classList.remove('active-layout') : rows.classList.remove('active-layout');
    clicked.classList.add('active-layout');
}

/***CLIENT SIDE PRODUCT API***/

let productCards = document.getElementsByClassName('product-card');
productCards = [].slice.call(productCards);
let filters = document.getElementsByClassName('catalog-filter');
filters = [].slice.call(filters);


filters.forEach(filter => {
    filter.addEventListener('click', redirect);
});

function redirect(e) {
    if(e.target.tagName == 'LABEL') e.preventDefault(); //this is to ignore input label clicks as they cause weird behavior

    let paramKey = this.children[0].name.toLowerCase();
    let paramVal = this.children[0].value.toLowerCase(); 
    console.log(paramKey, paramVal);
    window.location.replace("http://localhost/giaware/catalog?" + paramKey + '=' + paramVal);
}


/*

state['filterParams'] = {
    category: ['all'],
    priceRange: ['all'],
    brand: ['all']
};

function filterCatalog(e) {
    if(e.target.tagName == 'LABEL') e.preventDefault(); //this is to ignore input label clicks as they cause weird behavior
    let checkBox = this.children[0];
    let filter = checkBox.name;
    let flag = checkBox.value;
    flag == 'all' ? handleAllCheck(this) : handleAllSiblingCheck(this) ;
    //getProducts(filter, flag);

    if (e.target.type == 'checkbox') return;
    let filterCheckbox = this.children[0];
    filterCheckbox.checked = (filterCheckbox.checked) ? false : true;
}

function handleAllCheck(ele) {
    let siblingInputs = ele.parentNode.children;
    
    uncheckSiblingBoxes(siblingInputs);
}

function handleAllSiblingCheck(ele) {
    let allCheckBox = ele.parentNode.children[0].children[0];

    
    uncheckTheAllBox(allCheckBox);
}

function uncheckSiblingBoxes(filterSiblings) {
    for (let index = 1; index < filterSiblings.length; index++) {
        const ele = filterSiblings[index];
        ele.children[0].checked = false;
    }
}

function uncheckTheAllBox(allBox) {
    allBox.checked = false;
}

function getProducts(filter, flag) {

    let xhr = new XMLHttpRequest();
    let params = 

    xhr.open("GET", "product-api?" + params);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {//Call a function when the state changes.
        if (xhr.readyState == 4 && xhr.status == 200) {
            productJson = JSON.parse(xhr.responseText);
            console.log(productJson);
        }
    }

    xhr.send();

}
*/