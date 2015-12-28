<!DOCTYPE html>
<html>
<?php require "header.php";?>
<body>
<?php session_start()?>	
<?php require "navigation.php";?>




<?php 

if(isset($_SESSION['userid']) && $_SESSION['permission'] === "Manager"){
	echo '<div class="container main-bg">
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a id="trip-man" href="">Trips</a></li>
  <li role="presentation"><a id="customer-man" href="">Customers</a></li>
  <li role="presentation"><a id="transaction-man" href="">Transaction</a></li>
</ul>
</div>';


}

<div id="manager" class="container main-bg">
</div>


?>

<?php require "footer.php";?>
</body>

</html>