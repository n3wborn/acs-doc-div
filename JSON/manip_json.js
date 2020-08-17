
// we create a json formatted variable
let json = '{'+
	'"species" : "Dog",' +
	'"breed" : "Labrador Retriever",' +
	'"age" : 6,' +
	'"traits_json" : [ "red_eyes", "brown_coat"],' +
	'"traits" : {' +
		'"eye_color" : "brown",' +
		'"coat_color" : "white",' +
		'"weight" : "1371lbs"' +
	'}' +
'}';

// we parse it using JSON object and keep the result in myJSON variable
let myJSON = JSON.parse(json);

// check the result
console.log(myJSON);

// let's walk into it using the object properties
console.log(myJSON.species);
console.log(myJSON.traits_json);
console.log(myJSON.traits_json[0]);
console.log(myJSON.traits.eye_color);

// we change a variable
myJSON.age = 10;
console.log("After changing the age");
console.log(myJSON.age);
console.log(myJSON);

// we add a variable
myJSON.traits.cute = true;
console.log("After adding cute");
console.log(myJSON.traits.cute);

// we delete a variable
delete myJSON.weight;
console.log("After deleting weight");
console.log(myJSON);
