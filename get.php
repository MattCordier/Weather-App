<?php
	include 'ecomm_connect.php';
	$pdo = Database::connect();

	$id = addslashes($_REQUEST['id']);

	$image = mysql_query("SELECT * FROM image WHERE id = $id");


?>