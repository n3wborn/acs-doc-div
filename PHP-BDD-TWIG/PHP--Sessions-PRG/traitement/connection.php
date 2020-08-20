<?php

session_start();

if (isset($_POST['login']) && isset($_POST['password']) && $_POST['login'] == 'test' && $_POST['password'] == 'test') {
	$_SESSION['connected'] = true;
	header('location: ../gestion.php');

} else {

	header('location: ../index.php?error=1');
}

