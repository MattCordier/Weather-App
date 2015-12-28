<!DOCTYPE html>
<html>
<?php require "header.php";?>
<body>
<?php session_start()?>	
<?php require "navigation.php";?>
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Trips</a></li>
  <li role="presentation"><a href="#">Customers</a></li>
  <li role="presentation"><a href="#">Other Stuff</a></li>
</ul>


<?php require "CRUD/trip/index.php";

if(isset($_SESSION['userid']) && $_SESSION['permission'] === "Manager"){
require "CRUD/customer/index.php";
}


?>

<?php require "footer.php";?>
</body>

</html>