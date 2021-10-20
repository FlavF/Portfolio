/* *****VARIABLES***********
 **************************** */

// **** All pages : arrow up when too far down  ****
let buttonTop = document.getElementById("button-top");

// **** Page : Modal ****
let message = document.getElementById("message"); //open the modal
let modal = document.getElementById("modal"); //modal
let hidden = document.getElementsByClassName("hidden"); //modal
let close = document.getElementsByClassName("close")[0]; //to close modal

// **** Filter : page Projects and Photos ****
let btnContainer = document.getElementById("myBtnContainer");


/******FUNCTIONS***********
 ***************************/

// **** All pages : arrow up when too far down ****
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

// **** Page : Modal ****
// function showModal() {
// 	console.log("hello modal");
// 	try {
// 		modal.classList.remove("hidden");
// 		// console.log(modal);
// 	} catch (error) {
// 		console.log("il y a une erreur");
// 	}
// }

// function hideModal() {
// 	modal.classList.add("hidden");
// }

// const closeModal = (event) => {
// 	modal.classList.add("hidden");
// };

// **** Filter : page Projects and Photos ****
filterSelection("all");

function filterSelection(c) {
	let x, i;
	x = document.getElementsByClassName("filterDiv");
	if (c == "all") c = "";
	// Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
	for (i = 0; i < x.length; i++) {
		removeClass(x[i], "show");
		if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
	}
}

// Show filtered elements
function addClass(element, name) {
	let i, arr1, arr2;
	arr1 = element.className.split(" ");
	arr2 = name.split(" ");
	for (i = 0; i < arr2.length; i++) {
		if (arr1.indexOf(arr2[i]) == -1) {
			element.className += " " + arr2[i];
		}
	}
}

// Hide elements that are not selected
function removeClass(element, name) {
	let i, arr1, arr2;
	arr1 = element.className.split(" ");
	arr2 = name.split(" ");
	for (i = 0; i < arr2.length; i++) {
		while (arr1.indexOf(arr2[i]) > -1) {
			arr1.splice(arr1.indexOf(arr2[i]), 1);
		}
	}
	element.className = arr1.join(" ");
}

/*********CODE***********
 ***************************/
document.addEventListener("DOMContentLoaded", function () {
	// **** All pages : arrow up when too far down  ****
	//to show button when scroll down
	window.onscroll = function () {
		scrolling();
	};

	// going back top of the page
	buttonTop.addEventListener("click", goingBackTop);

	// **** Page : Modal ****
	// open modal
	// message.addEventListener("click", showModal);

	// //close modal
	// if (hidden) {
	// 	close.addEventListener("click", hideModal);
	// 	window.addEventListener("click", closeModal);
	// }

	// **** Filter : page Projects and Photos ****
	// Add active class to the current control button (highlight it)
	if (btnContainer) {
		let btns = btnContainer.getElementsByClassName("btn");
		for (let i = 0; i < btns.length; i++) {
			btns[i].addEventListener("click", function () {
				let current = document.getElementsByClassName("active");
				current[0].className = current[0].className.replace(" active", "");
				this.className += " active";
			});
		}
	}


});
