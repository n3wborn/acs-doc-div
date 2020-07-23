// function to show values in our <li> squares
function showNumber(arg) {
	const area_number = document.getElementById('area_number');
	area_number.innerText = arg;

	// we clone our result area
	const clone = area_number.cloneNode();
	clone.setAttribute('id', 'area_win');
	// We must find 3 to win
	const textDisplay = (number === 3) ? 'You win !' : 'You Lost ...';
	clone.innerText = textDisplay;
	document.body.insertBefore(clone, area_number.nextElementSibling);
}



window.addEventListener('load', function() {
	// we declare our constants
	const numbers = [];

	// we loop 10 times to create our ul/li
	// and add an event on each li
	for (let i = 0; i < 10; i++) {
		const ul = document.getElementById('app');
		const li = document.createElement('LI');

		// we want to be aware that an li was clicked
		li.addEventListener('click', function(e) {

			const squares = document.getElementsByTagName('LI');
			const index = [].indexOf.call(squares,e.target);				// e.target = element clicked

			// we fetch cliqued index correspondig value
			number = numbers[index];
			showNumber(number);
		})

		// we add a <li> element to our <ul>
		ul.appendChild(li);

		// add a number to our numbers array
		numbers.push(i + 1);
	}

	// we mix our numbers
	numbers.sort(() => Math.random() - 0.5);
})
