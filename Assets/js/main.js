/**
 * /* *************************
 * ******* VARIABLES *******
 * *************************
 *

 */

// **** All pages : ToggleMode between dark and light mode ****
let dark = document.getElementById("darkmode");
let prefersDarkMode = window.matchMedia("(prefers-color-scheme:dark)");

// **** All pages : arrow up when too far down  ****
let buttonTop = document.getElementById("button-top");

// **** Filter : page Projects and Photos ****
let btnContainer = document.getElementById("myBtnContainer");


/* *************************
* ******* FUNCTIONS *******
* *************************
*/

// **** All pages : ToggleMode between dark and light mode ****
dark.addEventListener("change", () => {
	if (prefersDarkMode.matches) {
		document.body.classList.toggle("light-theme");
	} else {
		document.body.classList.toggle("dark-theme");
	}
});

// **** All pages : arrow up when too far down ****
function scrolling() {
	// if desktop or +
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
	buttonTop.classList.add("hidden");
}
	
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

	/* *************************
			* ******* CODE *******
			* *************************
			*/

document.addEventListener("DOMContentLoaded", function () {
	// **** All pages : arrow up when too far down  ****
	//to show button when scroll down
	window.onscroll = function () {
		scrolling();
	};

	// going back top of the page
	buttonTop.addEventListener("click", goingBackTop);

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
