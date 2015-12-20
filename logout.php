<?php 

include 'ecomm_connect.php';
$pdo = Database::connect();

session_unset();

Database::disconnect();
header('Location: index.php');

?>