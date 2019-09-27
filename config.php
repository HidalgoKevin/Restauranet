<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("254389152270-imh2dlggg9jue63mb7gcoo47umtm6dcu.apps.googleusercontent.com");
	$gClient->setClientSecret("gsLJPQoXaOLIsqYckyBInVrT");
	$gClient->setApplicationName("CPI Login Tutorial");
	$gClient->setRedirectUri("http://localhost/Proyecto/Alta_Baja/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
