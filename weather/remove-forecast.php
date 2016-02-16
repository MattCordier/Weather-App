<?php
ini_set('error_reporting', E_ALL);

include_once 'includes/db_connect.php';
include_once 'includes/psl-config.php';

$id = $_POST['id'];

$prep_stmt = "DELETE FROM locations WHERE ID = ?";
$delete_stmt = $mysqli->prepare($prep_stmt);
$insert_stmt->bind_param('d', $id);
$insert_stmt->execute();
$insert_stmt->store_result();

echo "removed";
?>