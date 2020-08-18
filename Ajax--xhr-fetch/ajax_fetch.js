function readJsonFile(file, callback) {

	let myHeaders = new Headers();
	myHeaders.append('Accept', 'application/json');

	let myInit = {
		headers : myHeaders
	}

	window.fetch(file, myInit)
		.then(function(response) {
			console.log(response);
			return response.json();
		})
		.then(function(json) {
			callback(json);
		});
}

/*readJsonFile('./example.json', function(json) {
	console.log(json);
})*/


