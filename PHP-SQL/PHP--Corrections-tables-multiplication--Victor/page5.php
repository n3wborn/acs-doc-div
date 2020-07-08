<?php
require_once "header.php";
?>
<form method="post">
    <?php
    //Je génère les 5 questions aléatoirement
    for ($i = 0; $i < 5; $i++) {
        //Je créé également des inputs de type hidden contenant les valeurs aléatoires, je n'ai pas trouvé de meilleur moyen pour les récupérer une fois le formulaire soumis. Je leur donne également des noms spécifiques grâce aux itérations de ma boucle
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
if (!empty($_POST)) {
    //Je déclare des variables qui représenteront le score ainsi qu'un tableau qui contiendra les bonnes réponses attendues lorsqu'il y a eu une mauvaise réponse
    $score = 0;
    $itShouldHaveBeen = [];

    //var_dump($_POST); //les var_dump() ça aide


    for ($i = 0; $i < count($_POST) / 3; $i++) {
        //Vu que j'ai "3 données" dans l'ordre à la suite pour un seul calcul, je ne suis pas obligé de boucler sur tout le tableau sur sa taille / 3 
        if (intval($_POST["form" . $i . "rand1"]) * intval($_POST["form" . $i . "rand2"]) === intval($_POST["result" . $i])) {
            //Si le résultat est bon, j'augmente le score
            $score++;
        } else {
            //Si le score n'est pas bon, je rajoute le bon résultat dans mon tableau
            $expectedResult = intval($_POST["form" . $i . "rand1"]) * intval($_POST["form" . $i . "rand2"]);
            $itShouldHaveBeen[] = $_POST["form" . $i . "rand1"] . " * " . $_POST["form" . $i . "rand2"] . " = " . $expectedResult;
        }
    }
    //J'affiche le score
    echo "Votre score est de $score / 5 !";

    //S'il y a eu des mauvaises réponses
    if (!empty($itShouldHaveBeen)) {
        //J'affiche les bonnes réponses
        foreach ($itShouldHaveBeen as $answer) {
            echo "<p>";
            echo $answer;
            echo "</p>";
        }
    }
}
?>
</body>

</html>