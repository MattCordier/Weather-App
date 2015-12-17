<?php
	include 'ecomm_connect.php';
    $pdo = Database::connect();

$username = $_GET['un'];
$password = $_GET['pw'];
$sql = "SELECT * FROM customer where username =". $username;
foreach ($pdo->query($sql) as $row) {
       	echo '<div class= col-sm-4>';
        echo '<h2>'. $row['id'] . '</h2>';
        
        echo '</div>';
               
       }
        Database::disconnect();

        


?>