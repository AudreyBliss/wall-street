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


// //Get the modal
// var modal = document.getElementById('myModal');

// // Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks on the button, open the modal
// btn.onclick = function() {
//     modal.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// } 


/////
// var figures = document.querySelectorAll("#gallery figure");
// var nbFigures = figures.length;
// var modal = document.querySelector("#my-modal");
// var imgModal = document.querySelector("#my-modal img")
// var closeModal = document.querySelector("#my-modal .close-modal");
// var i;


// function modalOpen(){
// 	for(i=0; i<nbFigures; i++){
// 		figures[i].addEventListener("click", function(){
// 			let img = this.querySelector("img");
// 			let srcValue = img.getAttribute("src");
// 			let altValue = img.getAttribute("alt");
			
// 			imgModal.setAttribute("src",srcValue);
// 			imgModal.setAttribute("alt",altValue);
// 			modal.classList.remove("hide");
// 		});
// 	}
// }

// //fonction qui ferme la modale lorsqu'on clique sur le bouton fermer de la modale
// function modalClose(){
// 	closeModal.addEventListener("click", function(){
// 		modal.classList.add("hide");
// 	});
// }

// document.addEventListener("DOMContentLoaded", function(){
// 	modalOpen();  modalClose();
// });