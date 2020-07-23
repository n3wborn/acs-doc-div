// we target our links
const links = document.getElementsByTagName('a');


// for each link
for (link of links) {

	// handle click event
	link.addEventListener('click', function(e){
		e.preventDefault();

		// but we need to know it's grand-parent node before
		parentUL = this.parentElement.parentElement;

		// prepare to create and fill a new li
		newLI = document.createElement('LI');
		newLI.innerText = "click li";

		// to be able to insert newLI
		parentUL.insertBefore(newLI,this.parent);
	})


	// handle mouseover event
	link.addEventListener('mouseover', function(e){
		// don't click !
		e.preventDefault();


		// and create/fill another <li> after
		newLI = document.createElement('LI');
		newLI.innerText = "mouseover li!!";

		// but we need to know it's grand-parent node before
		parentUL = this.parentElement.parentElement;
		parentUL.insertBefore(newLI, this.parentElement.nextElementSibling);
	})
}

