<?php
	include 'ecomm_connect.php';
    $pdo = Database::connect();
	$username = $_POST['username'];
	$password = $_POST['password'];
	echo "hi". " ". $username . " " .$password;


    Database::disconnect();

        


?>