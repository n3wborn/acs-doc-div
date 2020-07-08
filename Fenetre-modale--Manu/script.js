//on selectionne les elements dont on a besoin
const deleteLinks = document.getElementsByClassName('btn-delete');
const noBtn = document.getElementById('modal-btn-no');
const yesBtn = document.getElementById('modal-btn-yes');

//btn-no ok ?
console.log(noBtn);


//ok ?
console.log(deleteLinks)

//pour chaque element du tout
for (deleteLink of deleteLinks) {
	deleteLink.addEventListener('click', function(e){
		e.preventDefault();
		//is it OK ?
		//console.log('ISO K');
		//Let's call our modal !
		const modal = document.getElementById('modal');
		//OK ?
		//console.log(modal);
		modal.classList.toggle('hidden');

		//ajout de la classe qui va bien
		console.log('TEST this');
		console.log(this.classList);
		this.classList.toggle('readyToDelete');

	})
}


//ecoute le click sur No et agit comme on veut
noBtn.addEventListener('click', function() {
		const modal = document.getElementById('modal');
		modal.classList.toggle('hidden');

		// selection du lien ayant readyToDelete
		const elementsToDelete = document.getElementsByClassName('readyToDelete')
		for (elementToDelete of elementsToDelete) {
			elementToDelete.classList.toggle('readyToDelete')
		}
})

//ecoute le click sur Yes et agit comme on veut
yesBtn.addEventListener('click', function() {

	// selection du lien ayant readyToDelete
	const elementsToDelete = document.getElementsByClassName('readyToDelete')
	for (elementToDelete of elementsToDelete) {
		location.href = elementToDelete.getAttribute('href');
	}
})