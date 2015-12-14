

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
	<label>
		<input name="button" id="button" type="submit" value="Log In" size="40">
	</label>
</form>

<?php require "footer.php";?>
</body>

</html>