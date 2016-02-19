<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include_once 'includes/db_connect.php';
include_once 'includes/psl-config.php';
include_once 'includes/functions.php'; 

sec_session_start();
$error_msg = ""; 
$id = $_SESSION['user_id'];
$date = $_POST['dpick'];
$address = $_POST['addy'];
$current = $_POST['cur'];
$high = $_POST['hi'];
$low = $_POST['lw'];
$feel = $_POST['feel'];
$wind = $_POST['wind'];
$humidity = $_POST['humid'];
$alert = $_POST['alert'];
$hour = $_POST['hour']; 
$summary = $_POST['smry'];







//check db to see how many entries a user has stored
$count = $mysqli->prepare("SELECT * FROM locations WHERE members_id = ?");
$count->bind_param('i', $id);
$count->execute();
$count_result = $count->get_result();
$r = mysqli_num_rows($count_result);

if ($r <= 9){
	$prep_stmt = "INSERT INTO locations (address, date, high, low, summary, members_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$insert_stmt = $mysqli->prepare($prep_stmt);
	$insert_stmt->bind_param('sssssssssssi', $address, $date, $current, $high, $low, $feel, $wind, $humidity, $alert, $hour, $summary, $id);
	$insert_stmt->execute();
	$insert_stmt->store_result();
	echo "added to favorites";
} else {
	echo "Limit reached.";
}

?>