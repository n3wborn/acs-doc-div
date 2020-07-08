<?php
    require_once "header.php";
?>
    <!-- Avoir cet attribut action avec cette valeur revient au même que s'il n'était pas précisé (dans ce cas) -->
    <form action="page3.php" method="post">
        <?php
        //Je boucle pour créer mes checkboxs. Dans ce cas, je rajoute un [] à la fin de la valeur de l'attribut name, cf : https://stackoverflow.com/questions/4688880/html-element-array-name-something-or-name-something
        for ($i = 1; $i <= 10; $i++) : ?>
            <input type="checkbox" name="numbers[]" value="<?= $i ?>"><label><?= $i ?></label>
        <?php endfor; ?>
        <button>Envoyer</button>
    </form>
    <?php
    if (!empty($_POST['numbers'])) {
        //Je créé une variable numbers qui contient $_POST["numbers"]
        $numbers = $_POST["numbers"];
        //Je boucle sur chaque élément de numbers, il est fréquent dans les boucles foreach d'avoir $pluriel as $singulier (vous décidez comment nommer l'alias)
        foreach ($numbers as $number) {
            //Je converti la chaîne de caractère number en entier
            $number = intval($number);
            //J'affiche les tables de multiplication demandée
            for ($i = 1; $i <= 10; $i++) {
                $resultat = $i * $number;
                echo "<p>" . $i . " * " . $number . " = " . $resultat . "</p>";
            }
        }
    }
    ?>
</body>

</html>