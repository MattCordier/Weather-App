<?php
	include 'ecomm_connect.php';
    $pdo = Database::connect();

$username = $_GET['un'];
$password = $_GET['pw'];
$sql = "SELECT * FROM customer where username =". $username;
	echo $sql;
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        echo $data['id'];
        Database::disconnect();

        


?>