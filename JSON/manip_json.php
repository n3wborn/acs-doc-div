<?php

// needed for ?
//header("Content-type: application/json");

// we put the content of our file in a variable
$json = file_get_contents(dirname(__FILE__).DIRECTORY_SEPARATOR."example.json");

// decode it's json encoded content and put it in a new var
$parsed_json = json_decode($json);

// we walk through our json and put values in variables
$species = $parsed_json->species;
$eye_color = $parsed_json->traits->eye_color;
$first_json_trait = $parsed_json->traits_json[0];

// and print them
echo "especes -> " . $species . '<br>';
echo "eye color -> " . $eye_color . '<br>';
echo "first json trait -> " . $first_json_trait . '<br>';


// we affect values
$parsed_json->traits->cute = true;
echo "parsed_json -> traits -> cute = " . $parsed_json->traits->cute  . '<br>';

// we delete one
unset($parsed_json->traits->weight);

// echo "<br/>The quick ".$eyes_color." fox jumps over the lazy ".$species;

// we show the parsed json
var_dump($parsed_json);

$parsed_json_tab = json_decode($json,true);
//var_dump(json_decode($json, true));

// we add a variable
$parsed_json_tab['traits']['cute'] = true;

// we delete another
unset($parsed_json_tab['traits']['weight']);

// we show the resulting array
var_dump($parsed_json_tab);

// we create an json encoded array
$json_array = array(
    "species" => "Cat",
    "breed" => "Maincoon",
    "age" => 16,
    "traits" => array(
      "eyeColor" => "green",
      "coatColor" => "brownwhite",
      "weight" => "137lbs"
        )
    );

// an we show it
echo "<pre>";
echo json_encode($json_array);
echo "</pre>";

