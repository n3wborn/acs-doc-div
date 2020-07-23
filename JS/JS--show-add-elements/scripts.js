//je cible mon element
const btn = document.getElementsByClassName('graph_button')[0];

//ma fonction pour afficher/masquer la couleur
function toggleGreen() {
	const btn = document.getElementsByClassName('graph_button')[0];
	btn.classList.toggle('graph_button--green');
}

//ma fonction pour afficher/masquer ma div
function toggleGraphBar() {
	const graphBar = document.querySelector('#app .graph_graph_bar');
	graphBar.classList.toggle('graph_graph_bar--h100');
}


//lors du click sur mon boutton
btn.addEventListener('click', function(){
	//change la couleur du bouton
	toggleGreen();
	//affiche/cache la div
	toggleGraphBar();
})