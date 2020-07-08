<?php
require_once "header.php";
?>

<form method="post">
<?php
for ($i = 0; $i < 5; $i++) {
  echo "<div>";
  $rand1 = mt_rand(1, 10);
  echo "<input type='hidden' name='form" . $i . "rand1' value='" . $rand1 . "'>";
  $rand2 = mt_rand(1, 10);
  echo "<input type='hidden' name='form" . $i . "rand2' value='" . $rand2 . "'>";
  echo "<label>Combien font " . $rand1 . " * " . $rand2 . " ? </label>";
?>
        <input type="text" name="result<?= $i ?>">
<?php
  echo "</div>";
}
?>
    <button>Envoyer</button>
</form>
<?php
//Technique avec du input hidden qui ne contient PAS le résultat
if (!empty($_POST)) {
  $score = 0;
  $itShouldHaveBeen = [];
  //var_dump($_POST);
  for ($i = 0; $i < count($_POST) / 3; $i++) {
    if (intval($_POST["form" . $i . "rand1"]) * intval($_POST["form" . $i . "rand2"]) === intval($_POST["result" . $i])) {
      $score++;
    } else {
      $expectedResult = intval($_POST["form" . $i . "rand1"]) * intval($_POST["form" . $i . "rand2"]);
      $itShouldHaveBeen[] = $_POST["form" . $i . "rand1"] . " * " . $_POST["form" . $i . "rand2"] . " = " . $expectedResult;
    }
  }
  echo "Votre score est de $score / 5 !";
  if (!empty($itShouldHaveBeen)) {
    foreach ($itShouldHaveBeen as $answer) {
      echo "<p>";
      echo $answer;
      echo "</p>";
    }
  }
}
?>
</body>

