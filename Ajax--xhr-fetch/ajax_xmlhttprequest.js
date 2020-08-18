// create an XMLHttpRequest object and put it in our xhr var
let xhr = new XMLHttpRequest();


// GET HTTP request for album.json
xhr.open("GET", "./album.json", true);


// if done
xhr.onreadystatechange = function() {
	if (xhr.readyState === 4 && xhr.status == "200") {
		// show response type
		console.log(xhr.responseText);
	}
}

// send datas
xhr.send();