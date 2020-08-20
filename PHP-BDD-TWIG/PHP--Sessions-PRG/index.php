<?php

$flag = false;
if (isset($_POST["login"]) && ($_POST["login"] === 'test')) {
	$flag = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sessions</title>
	<style>
		label {
			display: block;
			width: 250px;
		}
	</style>
</head>
<body>

	<h1>Sessions</h1>

	<form action="./traitement/connection.php" method="POST">
		<label for="login">Login :</label>
		<input type="text" name="login" id="login">
		<br>

		<label for="password">Password : </label>
		<input type="text" name="password" id="password">
		<br>

		<div id="error"></div>

		<?php
			if (isset($_GET['error'])) {
				echo "la connection n a pas pu aboutir <br>";
			}

		?>

		<input type="submit" value="se connecter">
	</form>
</body>
</html>


