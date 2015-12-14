<?php 
session_start();
if(!isset($_SESSION["manager"])){
	header("location:admin_login.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<?php require "header.php"; ?>
<body>
<?php require "navigation.php";?>

<?php require "footer.php";?>
</body>

</html>