function loadCaroussel() {
  // we give "active" class to the first picture
  pictures[0].classList.add('active');

  //we create a new div
  const areaButton = document.createElement('DIV');
  areaButton.classList.add('area_button');

  // we place it in caroussel's div
  caroussel.appendChild(areaButton);

  // for each picture
  for (let i = 0; i < pictures.length; i++) {
    // create an anchor
    const cursor = document.createElement('A');
    cursor.classList.add('cursor');
    cursor.setAttribute('href', '#');

    // if first pictur, add active class
    if (i === 0) {
      cursor.classList.add('active');
    }

    // listen to click
    cursor.addEventListener('click', function(e) {
      e.preventDefault();
      console.log('CLICK')
    });


    areaButton.appendChild(cursor);
  }
}


const caroussel = document.querySelector('.caroussel');
const pictures = document.querySelectorAll('ul > li');


if (pictures.length > 1) {
  loadCaroussel();
}

