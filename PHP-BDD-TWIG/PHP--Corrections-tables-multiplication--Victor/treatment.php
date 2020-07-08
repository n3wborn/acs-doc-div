<?php

//Le traitement est quasiment le même que dans page5.php
if (!empty($_POST)) {
    $score = 0;
    $itShouldHaveBeen = [];
    for ($i = 0; $i < count($_POST) / 3; $i++) {
        if (intval($_POST["form" . $i . "rand1"]) * intval($_POST["form" . $i . "rand2"]) === intval($_POST["result" . $i])) {
            $score++;
        } else {
            $expectedResult = intval($_POST["form" . $i . "rand1"]) * intval($_POST["form" . $i . "rand2"]);
            $itShouldHaveBeen[] = "<p>" . $_POST["form" . $i . "rand1"] . " * " . $_POST["form" . $i . "rand2"] . " = " . $expectedResult . "</p>";
        }
    }
}

//Je créé un tableau associatif où se trouve les éléments que je dois renvoyer au JavaScript
$data = ["score" => $score, "rightAnswers" => $itShouldHaveBeen];

//Je l'echo en l'encodant en json
echo json_encode($data);