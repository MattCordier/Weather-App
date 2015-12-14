

<!DOCTYPE html>
<html>
<?php require "header.php"; ?>
<?php
session_start();
if(isset($_SESSION["manager"])){
	header("location:admin.php");
	exit();
}

// if(isset($_POST["username"])&&($_POST["password"]))

// $sql = mysql_query("SELECT * FROM customer WHERE id ='$managerID' AND username = '$manager' AND password = '$password' LIMIT 1");
// $existCount = mysql_num_rows($sql);
// if($existCount == 1){
// 	foreach (($pdo->query($sql) as $row)) {
// 		$id = $row["id"];
// 	}
// 	$_SESSION["id"] = $id;
// 	$_SESSION["manager"] = $manager;
// 	$_SESSION["password"] = $password;
// 	header("location:admin.php");
// 	exit();
// } else {
// 	echo "That information is incorrect, please try again<a href="adminlogin.php">Click Here</a>";
// 	exit();
// }

?>
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