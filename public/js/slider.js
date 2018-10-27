'use strict';


let slides = [{
        image: 'public/img/batman-street-art.jpg',
        legend: 'We are Batman'
  },
    {
        image: 'public/img/be-free.jpg',
        legend: 'Free and furious'
  },
    {
        image: 'public/img/hands.jpg',
        legend: 'Colorful hands'
  },
    {
        image: 'public/img/streetart2.jpg',
        legend: 'No pain'
  },
    {
        image: 'public/img/london.jpg',
        legend: 'Jungle city'
  },
    
];

let state;

function onClickNext() {
    
    state.index++;
    
    if (state.index === slides.length) {
        state.index = 0;
    }
    
    refreshSlider();
}

function onClickPrevious() {
    
    state.index--;
    
    if (state.index < 0) {
        state.index = slides.length - 1
    }
    
    refreshSlider();
}



function refreshSlider() {
    
    let picture = document.querySelector("#slider img")
    let legend = document.querySelector("#slider figcaption")
    
    picture.src = slides[state.index].image
    legend.textContent = slides[state.index].legend
}


document.addEventListener('DOMContentLoaded', function() {
    
    state = {
        index: 0, 
        timer: null 
    };


   
    let previous = document.getElementById('slider-previous')
    previous.addEventListener('click', onClickPrevious)

    let next = document.getElementById('slider-next')
    next.addEventListener('click', onClickNext)

    refreshSlider()

});
