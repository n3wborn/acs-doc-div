<?php
require_once "header.php";
?>
<!-- Je créé un formulaire en précisant method="post", si l'attribut method n'est pas précisé, par défaut la method sera alors get. De même je n'ai pas précisé d'attribut action, de ce fait l'action par défaut est le fichier lui-même, ici page2.php donc -->
    <form method="post">

        <label for="number">Choisissez une table</label>
        <select name="number" id="number">
            <!-- Je créé mes options du select en bouclant 10 fois et ouvrant et fermant mes balises PHP afin d'insérer l'incrémentation de ma variable $i dans les options -->
            <?php for($i = 1; $i <= 10; $i++) : ?>

            <option value="<?= $i; ?>"><?= $i; ?></option>

            <?php endfor; ?>
            <!-- 
                for(...): //code endfor; est une autre syntaxe pour for(...) { //code } 
            -->

        </select>
        <!-- Button ou input type="submit" ça revient à peu près à la même chose -->
        <button name="formSubmit">Soumettre le formulaire</button>
    </form>

    <?php
        //S'il existe $_POST["formSubmit"], ce qui existera après qu'on ait soumit le formulaire
        if(isset($_POST["formSubmit"])) {
            //Si $_POST["number"] n'est pas vide
            if(!empty($_POST["number"])) {
                //J'affiche la table de multiplication demandée
                echo "<div>";
                for($i = 1; $i <= 10; $i++) {
                    $resultat = $i * intval($_POST["number"]);
                    echo "<p>" . $i . " * " . $_POST['number'] . " = " . $resultat . "</p>";
                }
                echo "</div>";
            }
        }
    ?>
</body>
</html>