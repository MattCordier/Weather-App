<?php
ini_set('error_reporting', E_ALL);

include_once 'includes/db_connect.php';
include_once 'includes/psl-config.php';

$id = $_POST['id'];

$prep_stmt = "DELETE FROM locations WHERE ID = ?";
$delete_stmt = $mysqli->prepare($prep_stmt);
$delete_stmt->bind_param('i', $id);
$delete_stmt->execute();
$delete_stmt->store_result();

echo "removed";
?>