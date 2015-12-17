
<!DOCTYPE html>
<html>
<?php require "header.php";?>
<?php include 'ecomm_connect.php';
    $pdo = Database::connect();
?>

<body>
<?php require "navigation.php";?>

	<form id="login" action="authorize.php" method="POST" enctype="multipart/form-data">
		User Name:
		<input type="text" name="fn">
		Password:
		<input type="text" name="ln">
		<input id="logbtn" class="btn" type="button" value="Log In">
	</form>
	


	
<?php Database::disconnect(); ?>
<?php require "footer.php";?>
</body>

</html>