// we select our caroussel and every li inside
const caroussel = document.querySelector('.caroussel');
const pictures = caroussel.querySelectorAll('ul>li');


let chrono = null;

// load caroussel if we have pictures
if(pictures.length > 1){
  loadCaroussel();
}



function loadCaroussel() {
  // We give the 1st li active class
  pictures[0].classList.add('active');

  // create a areaButton div with area_button class
  const areaButton = document.createElement('DIV');
  areaButton.classList.add('area_button');

  // loop through our pictures
  for (let i=0; i < pictures.length; i++) {

    // create a "cursor" with it's own class
    const cursor = document.createElement('A');
    cursor.classList.add('cursor');

    // and give it "active" class
    if (i === 1) {
      cursor.classList.add('active');
  }

  // give a target to our cursor
  cursor.setAttribute('href', '#');

  cursor.addEventListener('click', function(e){
    // if clicked, do not follow the link and stop chrono
    e.preventDefault;
    clearTimeout(chrono);

    // Select every link in our div
    const cursors = caroussel.querySelectorAll('div > a');
    // Giv it an index
    const index = [].indexOf.call(cursors, this);

    // and play from this index
    carousselPlay(index);
  })

  areaButton.appendChild(cursor);
  chrono = setTimeout('carousselPlay();', 5000);
  }

  // add areaButton's div
  caroussel.appendChild(areaButton);
}



function carousselPlay(index = -1) {
  if (index === -1) {
    autoPlay();
  } else {
    manualPlay(index);
  }
}



function manualPlay(index) {
  // Select the li having li class
  const currentPicture = caroussel.querySelector('ul>li.active');

  // keep trace of current index
  const currentIndex = [].indexOf.call(pictures, currentPicture);

  // and if we're not on current index
  if (index !== currentIndex) {

    // We modify which picture is "active"
    currentPicture.classList.remove('active');
    pictures[index].classList.add('active');

    // which cursor is "active" too
    const cursors = caroussel.querySelectorAll('div > a');
    cursors[currentIndex].classList.remove('active');
    cursors[index].classList.add('active');

    // and set a timeout
    chrono = setTimeout('carousselPlay()', 5000);
  }
}



function autoPlay() {
  //Sélection du li qui à la classe active
  const currentPicture = caroussel.querySelector('ul>li.active');

  // li qui à la classe active parmis tous les li
  const currentIndex = [].indexOf.call(pictures, currentPicture);

  const index = (currentIndex === (pictures.length - 1)) ? 0 : currentIndex + 1;

  if (index !== currentIndex) {

    // We modify which picture is "active"
    currentPicture.classList.remove('active');
    pictures[index].classList.add('active');

    // We modify which cursor is "active"
    const cursors = caroussel.querySelectorAll('div > a');
    cursors[currentIndex].classList.remove('active');
    cursors[index].classList.add('active');

    chrono = setTimeout('carousselPlay()', 5000);
  }
}