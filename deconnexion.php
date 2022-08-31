<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	header("Location: module_connexion/connexion.php");
	?>