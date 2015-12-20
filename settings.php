<!DOCTYPE html>
<html>
<?php require "header.php";?>
<body>
<?php session_start()?>	
<?php require "navigation.php";?>
<?php require "CRUD/trip/index.php";

if(isset($_SESSION['userid']) && $_SESSION['permission'] === "Manager"){
require "CRUD/customer/index.php";?>
}




<?php require "footer.php";?>
</body>

</html>