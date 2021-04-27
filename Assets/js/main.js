/**
 * *** VARIABLES***********
 * *************************
 *
 * @format
 */

// **** Page : Modal ****
let message = document.getElementById("message"); //open the modal
let modal = document.getElementById("modal"); //modal
let hidden = document.getElementsByClassName("hidden"); //modal
let close = document.getElementsByClassName("close")[0]; //to close modal

/******FUNCTIONS***********
 ***************************/

function showModal() {
	console.log("hello modal");
	try {
		modal.classList.remove("hidden");
		console.log(modal);
	} catch (error) {
		console.log("il y a une error");
	}
	
}

function hideModal() {
	modal.classList.add("hidden");
}

const closeModal = (event) => {
	modal.classList.add("hidden");
};

/*********CODE***********
 ***************************/
document.addEventListener("DOMContentLoaded", function () {
	// open modal
	message.addEventListener("click", showModal);

	//close modal
	if (hidden) {
		close.addEventListener("click", hideModal);
		window.addEventListener("click", closeModal);
	}
});
