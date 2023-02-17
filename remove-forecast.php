<?php

include_once 'includes/db_connect.php';
include_once 'includes/psl-config.php';
include_once 'includes/functions.php'; 
sec_session_start(); 
$id = $_POST['id'];

$prep_stmt = "DELETE FROM locations WHERE ID = ?";
$delete_stmt = $mysqli->prepare($prep_stmt);
$delete_stmt->bind_param('i', $id);
$delete_stmt->execute();
$delete_stmt->store_result();

echo "Forecast Removed";
?>