//Récupération des éléments HTML
const searchInput = document.getElementById("search");
const form = document.querySelector("form");
const datalist = document.querySelector("datalist");

//On écoute l'événement "input" sur le champ de recherche
searchInput.addEventListener("input", () => {
  //On créé une variable qui contient un ensemble de paires clé/valeur représentant les champs du formulaire et leurs valeurs
  let formData = new FormData(form);

  //On communique avec le script PHP en asynchrone et on envoie les données du formulaire au script avec la méthode POST
  fetch("autocomplete.php", {
    body: formData,
    method: "post",
  })
    //Spécifique à fetch, le script PHP nous a renvoyé une Response en JSON, on la parse afin d'obtenir un tableau d'objets JavaScript que l'on peut manipuler
    .then((response) => response.json())

    //On manipule le tableau d'objets JavaScript qu'on appelle datas
    .then((datas) => {
      console.log(datas);
      //On vide la datalist
      datalist.innerHTML = "";
      //On boucle sur le tableau d'objets JavaScript
      datas.forEach((data) => {
        //On créé un créé un élément HTML option
        let option = document.createElement("option");
        //On affecte la valeur de l'élément créé
        option.value = data.title;
        //On ajoute en noeud enfant à la datalist l'option créé
        datalist.appendChild(option);
      });
    });

  //Avec XMLHttpRequest
  /*const xhr = new XMLHttpRequest();
  xhr.open("POST", "autocomplete.php", true);
  xhr.send(formData);
  xhr.addEventListener("readystatechange", () => {
    if (xhr.readyState === 3) {
      console.log("ça charge");
    }
    if (xhr.readyState === 4 && xhr.status === 200) {
      let datas = JSON.parse(xhr.responseText);
      datalist.innerHTML = "";
      datas.forEach((data) => {
        let option = document.createElement("option");
        option.value = data.title;
        datalist.appendChild(option);
      });
    }
  });*/
});
