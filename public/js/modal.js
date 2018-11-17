var figures = document.querySelectorAll("#gallery figure");
var nbFigures = figures.length;
var modal = document.querySelector("#my-modal");
var bgModal = document.querySelector(".background-modal");
var imgModal = document.querySelector("#my-modal img")
var closeModal = document.querySelector("#my-modal .close-modal");
var h2Modal =  document.querySelector("#my-modal h2");
var pModal =  document.querySelector("#my-modal p");
var i;

//fonction qui ouvre la modale
function modalOpen(){
	for(i=0; i<nbFigures; i++){
		figures[i].addEventListener("click", function(){
            let img = this.querySelector("img");
            let dataTitleValue = img.getAttribute("data-title");
            let dataGeoValue = img.getAttribute("data-geo");
			let srcValue = img.getAttribute("src");
			let altValue = img.getAttribute("alt");
		//injecte les données dans les attribut	
			imgModal.setAttribute("src",srcValue);
            imgModal.setAttribute("alt",altValue);
        //injecte les données dans les balises html
            h2Modal.innerHTML = dataTitleValue;
			pModal.innerHTML = dataGeoValue;
			bgModal.classList.remove("hide");
			modal.classList.remove("hide");
		});
	}
}

//fonction qui ferme la modale 
function modalClose(){
	closeModal.addEventListener("click", function(){
		modal.classList.add("hide");
		bgModal.classList.add("hide");
	});
}

//execution des fonctionss
document.addEventListener("DOMContentLoaded", function(){
	modalOpen();  modalClose();
});


 


