<?php 
session_start();
$confirmation = "logged in as". $manager;
echo $confirmation;
// session_start();
// if(!isset($_SESSION["manager"])){
// 	header("location:adminlogin.php");
// 	exit();
// }


// $managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]);
// $manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]);
// $password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]);
// include 'ecomm_connect.php';
// $sql = mysql_query("SELECT * FROM customer WHERE id ='$managerID' AND username = '$manager' AND password = '$password' LIMIT 1");
// $existCount = mysql_num_rows($sql);
// if($existCount == 0){
// 	header("location:index.php");
// 	exit();

?>
<!DOCTYPE html>
<html>
<?php require "header.php";?>

<body>
<?php require "navigation.php";?>
	<form action="admin.php" method="POST" enctype="multipart/form-data">File:
		<input type="file" name="image">
		<input type="submit" value="Upload">
	</form>
	<?php 
		$file = $_FILES['image']['tmp_name'];
		
		if (!file_exists($file) || !is_uploaded_file($file)) {
			echo "Please Select an Image.";
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = $_FILES['image']['name'];
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			echo $image;
		}  

		// if ($image_size == FALSE){
		// 	echo "That's not an image";
		// } else {

		// 	/////CHECK THIS OUT!!!!!!!!!!!!
		// 	if (!$insert = mysql_query("INSERT INTO image (name, image)VALUES ($image_name, $image)")){
		// 		echo "Problem Uploading Image.";
		// 	} else{
		// 		$lastid = mysql_insert_id();
		// 		echo "Image Uploaded. Your Image: echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>'";
		// 	}
		// }


	?>	
<?php Database::disconnect(); ?>
<?php require "footer.php";?>
</body>

</html>