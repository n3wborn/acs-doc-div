const body = document.body;

readJsonFile("album.json", function(json){
	console.log(json);

	let div = document.createElement('div');
	div.classList.add('container');
	body.appendChild(div);

	json.album.forEach(function(value) {
		let divImg = document.createElement('div');
		divImg.classList.add('container_img');

		let img = document.createElement('img');
		img.setAttribute('src', value.url);

		let legende = document.createElement('p');
		legende.innerText = value.legende;

		let date = document.createElement('p');
		date.innerText = value.date;

		let lieu = document.createElement('p');
		lieu.innerText = value.lieu;

		divImg.appendChild(img);
		divImg.appendChild(legende);
		divImg.appendChild(date);
		divImg.appendChild(lieu);

		div.appendChild(divImg);
	})
});