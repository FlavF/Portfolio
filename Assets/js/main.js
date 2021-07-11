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

// show button scroll when the scrolling down go over 20px
function scrolling() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		buttonTop.classList.remove("hidden");
	} else {
		buttonTop.classList.add("hidden");
	}
}

// when click on the button ^ going back to top of the page
function goingBackTop() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}

// Modal
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
	//to show button when scroll down
	window.onscroll = function () {
		scrolling();
	};

	// going back top of the page
	buttonTop.addEventListener("click", goingBackTop);

	// open modal
	message.addEventListener("click", showModal);

	//close modal
	if (hidden) {
		close.addEventListener("click", hideModal);
		window.addEventListener("click", closeModal);
	}
});
