// We select the links we want
const links = document.querySelectorAll('td > a');

// We listen if they're clicked
for (let link of links) {
	link.addEventListener('click', function(e) {
		e.preventDefault();
		// We want a target
		const gParent = this.parentElement.parentElement;
		// and we remove it
		gParent.remove();
	})
}