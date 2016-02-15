<?php
ini_set('error_reporting', E_ALL);

include_once 'includes/db_connect.php';

$error_msg = ""; 
$date = $_POST['dpick'];
$address = $_POST['addy'];
$high = $_POST['hi'];
$low = $_POST['lw'];
$summary = $_POST['smry']; 

echo $date . " " . $address ." ". $summary . ' added to favorites';


// if (isset($_POST['dpick'], $_POST['addy'])) {

// 	$date = filter_input(INPUT_POST, 'dpick', FILTER_SANITIZE_STRING);
// 	$address = filter_input(INPUT_POST, 'addy', FILTER_SANITIZE_STRING);
// } else {
// 	$error_msg .= '<p class="error">The date or address entered is not vaild</p>'
// }
	

$insert_stmt = $mysqli->prepare("INSERT INTO locations (address, date, high, low, summary) VALUES (?, ?, ?, ?, ?)")
$insert_stmt->bind_param($address, $date, $high, $low, $summary);
$insert_stmt->execute();
header('Location: login.php');
?>