<?php
	$server = "localhost";
	$database = "trivia-quiz";
	$username = "root";
	$password = "";
	//$database = "abramlim_manlapazdb";
	//$username = "abramlim_renzel";
	//$password = "Athisisalongpassword";
	date_default_timezone_set('Asia/Manila');

	$con = new  mysqli($server, $username, $password, $database);
?>