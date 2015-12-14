

<!DOCTYPE html>
<html>
<?php require "header.php"; ?>
<?php
session_start();
if(isset($_SESSION["manager"])){
	header("location:admin.php");
	exit();
}

if(isset($_POST["manager"])&&($_POST["password"])){
	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["manager"]);
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);

$sql = mysql_query("SELECT id FROM customer WHERE username = '$manager' AND password = '$password' LIMIT 1");
echo "<script>console.log('" . $sql . "');</script>";

$existCount = mysql_num_rows($sql);
	// if($existCount == 1){
	// 	echo "WHOO!";
	// 	// foreach ($pdo->query($sql) as $row) {
	// 	// 	$id = $row["id"];
	// 	// }
	// 	// $_SESSION["id"] = $id;
	// 	// $_SESSION["manager"] = $manager;
	// 	// $_SESSION["password"] = $password;
	// 	// header("location:admin.php");
	// 	exit();
	// } 
}

?>
<body>


<?php require "navigation.php";?>

<form id="login" name="login" method="post" action="adminlogin.php">
	User Name:<br/>
		<input name="manager" type="text" size="40">
		<br/>
	Password:<br/>
		<input name="password" type="password" size="40">
	
		<input name="button" id="button" type="submit" value="Log In" size="40">
	
</form>

<?php require "footer.php";?>
</body>

</html>