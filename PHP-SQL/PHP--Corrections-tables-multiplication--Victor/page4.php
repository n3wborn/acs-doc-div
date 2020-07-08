<?php
//Je démarre une session (IMPORTANT, à écrire avant le moindre code HTML)
session_start();
require_once "header.php";
?>
<form action="" method="post">
    <label for="number">Choisissez une table</label>
    <select name="chooseNumber" id="number">
        <?php for ($i = 1; $i <= 10; $i++) : ?>
            <option value="<?= $i; ?>"><?= $i; ?></option>
        <?php endfor; ?>
    </select>
    <button name="chooseTable">Soumettre le formulaire</button>
</form>
<?php 
    if(isset($_POST["chooseNumber"]) && !empty($_POST['chooseNumber'])):
        $random = mt_rand(1, 10);
        //Je ne pourrai pas garder les valeurs de $_POST["chooseNumber"] et de $random après la soumission du 2ème formulaire (car rafraîchissement de la page), je les stocke donc dans la superglobale $_SESSION
        $_SESSION["chooseNumber"] = intval($_POST["chooseNumber"]);
        $_SESSION["random"] = $random;
        ?>
        <br>
        <br>
        <br>
        <br>
        <form action="" method="post">
            <label for="answer">Combien font <?= $_POST["chooseNumber"] ?> * <?= $random ?></label>
            <input type="text" name="answer" id="answer">
            <button name="formAnswer">Envoyer !</button>
        </form>
    <?php endif; ?>

    <?php 
    //À la soumission du 2ème formulaire
        if(isset($_POST["formAnswer"]) && !empty($_POST["answer"])) {
            //Je vérifie sur le résultat donné est le résultat attendu
            $resultat = $_SESSION["random"] * $_SESSION["chooseNumber"];
            if(intval($_POST["answer"]) === $resultat) {
                echo "Bravo, vous êtes un génie !";
            } else {
                echo "Mauvaise réponse !";
            }
        } 
    ?>
</body>
</html>