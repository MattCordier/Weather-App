<!DOCTYPE html>
<html>
<?php require "header.php";?>
<body>
<?php session_start()?>	
<?php require "navigation.php";?>
<div class="container">
	<ul class="nav nav-tabs">
   		<li role="presentation"><a href="">Home</a></li>
   		<li role="presentation"><a href="#">Profile</a></li>
   		<li role="presentation"><a href="#">Messages</a></li>
 	</ul>

<?php 
if(isset($_SESSION['userid']) && $_SESSION['permission'] === "Guide"){
	require "trip_index.php";
	require "destination_index.php";
	require "style_index.php";		
} elseif(isset($_SESSION['userid']) && $_SESSION['permission'] === "Manager"){
	require "trip_index.php";
	require "destination_index.php";
	require "style_index.php";	
	require "customer_index.php";
	
} elseif(isset($_SESSION['userid']) && $_SESSION['permission'] === "Customer"){
	echo $_SESSION['userid'];
	$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customer where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['userid']));
        $data = $q->fetch(PDO::FETCH_ASSOC); 
}


?>
</div><!--end container-->

<?php require "footer.php";?>
</body>

</html>