<?php
session_start();
if(isset($_SESSION["manager"])){
	header("location:admin.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<?php require "header.php"; ?>
<body>


<?php require "navigation.php";?>

<form id="login" name="login" method="post" action="adminlogin.php">
	User Name:<br/>
		<input name="username" type="text" size="40">
		<br/>
	Password:<br/>
		<input name="password" type="password" size="40">
	
		<input name="button" id="button" type="submit" value="Log In" size="40">
	
</form>

<?php require "footer.php";?>
</body>

</html>