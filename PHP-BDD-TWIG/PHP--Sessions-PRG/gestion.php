<?php
require(dirname(__FILE__).DIRECTORY_SEPARATOR."function.php");
 ?>

<?php

session_start();
is_connected();

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Session</title>
	</head>
	<style>
		p {
			text-align: right;

		}
	</style>
	<body>
		<p>
			<a href="./traitement/deconnection.php">Deconnection</a>
		</p>

		<h1>Mon interface de Gestion</h1>
	</body>
</html>

