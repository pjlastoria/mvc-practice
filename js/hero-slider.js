let slides = document.getElementsByClassName('slide');
let tabs = document.getElementsByClassName('slide-tabs')[0].children;
tabs = [].slice.call(tabs);
let sliderTick = setInterval(deactivateSlide, 5000);

state['currSlide'] = 0;

tabs.forEach(tab => {
    tab.addEventListener('click', deactivateSlide);
});

function deactivateSlide(e) {
    slides[state.currSlide].classList.remove('active-slide');
    tabs[state.currSlide].classList.remove('active-tab');
 
    if(e !== undefined) return activateSlide(e.target);
    passiveSlide();
}

function passiveSlide() {

    if(state.currSlide === 2) state.currSlide = -1;
    slides[++state.currSlide] .classList.add('active-slide');
    tabs[state.currSlide].classList.add('active-tab');
}

function activateSlide(clickedTab) {
    let ind = tabs.indexOf(clickedTab);

    slides[ind] .classList.add('active-slide');
    tabs[ind].classList.add('active-tab');
    state.currSlide = ind;

    clearInterval(sliderTick);
    sliderTick = setInterval(deactivateSlide, 5000);
}