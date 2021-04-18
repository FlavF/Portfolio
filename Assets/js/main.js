/**
* *** VARIABLES***********
* *************************
*/

// **** Pages : Back ****
let deleted = document.querySelectorAll(".delete");

/******FUNCTIONS***********
***************************/

// **** Pages : Back ****
const deleteConfirm = (event) => {
    confirm = window.confirm('Etes-vous sûr de vouloir supprimer cette entrée ?');
    // if don't accept delete so no delete
    if (!confirm) {
        event.preventDefault();
    }
}



/*********CODE***********
***************************/
document.addEventListener("DOMContentLoaded", function () {


	// **** Pages : Back ****
	if (deleted) {
		for (let y = 0; y < deleted.length; y++) {
			deleted[y].addEventListener("click", deleteConfirm);
		}
	}


})
