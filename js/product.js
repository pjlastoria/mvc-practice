let mainImgContainer = document.getElementsByClassName('product-image-main')[0].children[0];
let imgSlides = document.getElementsByClassName('image-slide');
imgSlides = [].slice.call(imgSlides);

state['currImg'] = imgSlides[0].src;

imgSlides.forEach(img => {
    img.addEventListener('click', deactivateSlide);
});

function deactivateSlide(e) {
    state['currImg'] = this.children[0].src
 
    renderSlide();
}

function renderSlide() {
    mainImgContainer.src = state['currImg'];
}