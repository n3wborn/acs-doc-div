<?php
//Mon fichier header.php sera copié ici, ce qui fait que je n'ai pas à réécrire plusieurs fois le même code
require_once "header.php";
    $nombre = 3;
    //je boucle 10 fois
    for ($i = 1; $i <= 10; $i++) :
        $resultat = $i * $nombre;

        //Il existe différentes manière de concaténer ou d'insérer des variables dans des chaînes de caractère en PHP :

        //echo "<p>" . $nombre . " * " . $i . " = " . $resultat . "</p>";
        //echo "<p>{$nombre} * {$i} = {$resultat}</p>";
        echo "<p>$nombre * $i = $resultat</p>";
    endfor;
    ?>
</body>

</html>