<?php
ini_set('error_reporting', E_ALL);

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

// $error_msg = "";  

// if (isset($_POST['dpick'], $_POST['addy'])) {
// 	$date = filter_input(INPUT_POST, 'dpick', FILTER_SANITIZE_STRING);
// 	$address = filter_input(INPUT_POST, 'addy', FILTER_SANITIZE_STRING);
// } else {
// 	$error_msg .= '<p class="error">The date or address entered is not vaild</p>'
// }
// 	$high = $_POST['hi'];
//     $low = $_POST['lw'];
//     $summary = $_POST['smry'];

// $insert_stmt = $mysqli->prepare("INSERT INTO locations (address, date, high, low, summary) VALUES (?, ?, ?, ?, ?)")
// $insert_stmt->bind_param($address, $date, $high, $low, $summary);
// $insert_stmt->execute();
header('Location: login.php');
?>