let flashMsg = document.getElementsByClassName('flash-msg')[0];
let mainBrowse = document.getElementsByClassName('main-browse')[0];
let leftModal = document.getElementsByClassName('left-modal')[0];
let sideBrowse = document.getElementsByClassName('side-browse')[0];

let cartBtn = document.getElementsByClassName('nav-cart')[0];
let rightModal = document.getElementsByClassName('right-modal')[0];
let sideCart = document.getElementsByClassName('side-cart')[0];

let state = {};

mainBrowse.addEventListener('click', showBrowse);
leftModal.addEventListener('click', hideBrowse);

cartBtn.addEventListener('click', showCart);
rightModal.addEventListener('click', hideCart);

function showBrowse(e) {
    if(leftModal.classList.contains('show-modal')) return hideModal(e) ;

    leftModal.classList.add('show-modal');
    sideBrowse.classList.add('anim-side-browse');
    document.body.style.overflow = 'hidden';
}

function hideBrowse(e) {
    if(e.target == sideBrowse) { return; }

    leftModal.classList.remove('show-modal');
    sideBrowse.classList.remove('anim-side-browse');
    document.body.style.overflow = '';
}

function showCart(e) {
    if(rightModal.classList.contains('show-modal')) return hideCart(e) ;

    rightModal.classList.add('show-modal');
    sideCart.classList.add('anim-side-cart');
    document.body.style.overflow = 'hidden';
}

function hideCart(e) {
    if(e.target == sideBrowse) { return; }

    rightModal.classList.remove('show-modal');
    sideCart.classList.remove('anim-side-cart');
    document.body.style.overflow = '';
}