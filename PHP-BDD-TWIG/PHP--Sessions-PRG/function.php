<?php


function is_connected() {
	if (isset($_SESSION['connected']) && $_SESSION['connected']) {
		return;
	} else {
		header("location: ./index.php");
	}
}