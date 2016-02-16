<?php
include_once 'includes/db_connect.php';
include_once 'includes/psl-config.php';
sec_session_start(); 

$error_msg = ""; 
$id = $_SESSION['id'];
$date = $_POST['dpick'];
$address = $_POST['addy'];
$high = $_POST['hi'];
$low = $_POST['lw'];
$summary = $_POST['smry']; 
	

$prep_stmt = "INSERT INTO locations (address, date, high, low, summary) VALUES (?, ?, ?, ?, ?, ?)";
$insert_stmt = $mysqli->prepare($prep_stmt);
$insert_stmt->bind_param('sssss', $address, $date, $high, $low, $summary, $id);
$insert_stmt->execute();
$insert_stmt->store_result();

echo "added to favorites";

?>