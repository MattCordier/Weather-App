<?php
	include 'ecomm_connect.php';
    $pdo = Database::connect();
	$username = $_GET['un'];
	$password = $_GET['pw'];
	$sql = "SELECT * FROM customer where username =". $username;


    Database::disconnect();

        


?>