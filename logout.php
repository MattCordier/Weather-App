<?php 

include 'ecomm_connect.php';
$pdo = Database::connect();
session_start();
session_unset();
session_destroy();

Database::disconnect();
header('Location: index.php');

?>