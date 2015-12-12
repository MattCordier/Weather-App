
	<head>
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="author" content="Matt Cordier">
	    <meta name="description" content="">
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
	    <link rel="stylesheet" href="assets/css/normalize.css">
	    <link rel="stylesheet" type="text/styles" href="assets/css/styles.css">
	  
	</head>
<?php
	include 'ecomm_connect.php';
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES, true);
?>