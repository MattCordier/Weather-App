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
	require "CRUD/trip/index.php";	
} elseif(isset($_SESSION['userid']) && $_SESSION['permission'] === "Manager"){
	require "CRUD/trip/index.php";	
	require "CRUD/customer/index.php";
} elseif(isset($_SESSION['userid']) && $_SESSION['permission'] === "Customer"){
	echo "Hello"; 
}


?>
</div>

<?php require "footer.php";?>
</body>

</html>