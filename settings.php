<!DOCTYPE html>
<html>
<?php require "header.php";?>
<body>
<?php session_start()?>	
<?php require "navigation.php";?>
<div class="container">
	<ul class="nav nav-tabs">
   		<li role="presentation" class="active"><a href="#">Home</a></li>
   		<li role="presentation"><a href="#">Profile</a></li>
   		<li role="presentation"><a href="#">Messages</a></li>
 	</ul>
</div>
<?php 

if(isset($_SESSION['userid']) && $_SESSION['permission'] === "Manager"){
require "CRUD/trip/index.php";	
require "CRUD/customer/index.php";
}


?>

<?php require "footer.php";?>
</body>

</html>