
<!DOCTYPE html>
<html>
<?php require "header.php";?>
<?php include 'ecomm_connect.php';
    $pdo = Database::connect();
?>

<body>
	
<?php require "navigation.php";?>
<div class="container main-bg">
		<div class="row">
          <h3>Log In</h3>
        </div>

	<form id="login" action="authorize.php" method="POST" enctype="multipart/form-data">
		<div class="control-group">
			<label class="control-label">User Name</label>
			<input id="username" type="text" name="username">
	    </div>
		<label class="control-label">Password</label>
		<input id="password" type="password" name="password">
		<input id="logbtn" class="btn" type="submit" value="Log In">
	</form>
	<div id="confirmlog"></div>

</div>


	


	
<?php Database::disconnect(); ?>
<?php require "footer.php";?>
</body>

</html>