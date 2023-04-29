let arrows = document.getElementsByClassName('carousel-arrows')[0].children;
let leftArrow = arrows[0];
let rightArrow = arrows[1];

let cardWrapper = document.getElementsByClassName('card-wrapper')[0];
state['carouselPos'] = 0;
let animScroll, x = 1;

leftArrow.addEventListener('click', moveCarouselLeft);
rightArrow.addEventListener('click', moveCarouselRight);

function moveCarouselRight() {
    if(state['carouselPos'] <= -100) {
        return deactivate(rightArrow);
    }

    activate(leftArrow);
    state['carouselPos'] -= 20;
    animScroll = requestAnimationFrame(animRight);
}

function moveCarouselLeft() {
    if(state['carouselPos'] >= 0) {
        return deactivate(leftArrow);
    };

    activate(rightArrow);
    state['carouselPos'] += 20;
    animScroll = requestAnimationFrame(animLeft);
}

function animRight() {
    if(x == state['carouselPos']) return cancelAnimationFrame(animScroll);
    x--;
    cardWrapper.style.left = x + '%';
    
    animScroll = requestAnimationFrame(animRight);
}

function animLeft() {
    if(x == state['carouselPos']) return cancelAnimationFrame(animScroll);
    x++;
    cardWrapper.style.left = x + '%';
    
    animScroll = requestAnimationFrame(animLeft);
}

function activate(arrow) {
    arrow.classList.contains('inactive') ? arrow.classList.remove('inactive') : null;
}

function deactivate(arrow) {
    arrow.classList.contains('inactive') ? null : arrow.classList.add('inactive');
}