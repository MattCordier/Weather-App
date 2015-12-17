<?php
	include 'ecomm_connect.php';
    $pdo = Database::connect();
	$username = $_GET['un'];
	$password = $_GET['pw'];
	echo "hi". $username . " ".$password;


    Database::disconnect();

        


?>