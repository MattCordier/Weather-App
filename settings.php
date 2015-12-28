<!DOCTYPE html>
<html>
<?php require "header.php";?>
<body>
<?php session_start()?>	
<?php require "navigation.php";?>




<?php 

if(isset($_SESSION['userid']) && $_SESSION['permission'] === "Manager"){
	echo '<div class="container">
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Trips</a></li>
  <li role="presentation"><a href="#">Customers</a></li>
  <li role="presentation"><a href="#">Transaction</a></li>
</ul>
</div>';


}


?>

<?php require "footer.php";?>
</body>

</html>