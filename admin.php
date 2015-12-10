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
		echo $file;


		// if(!isset($file)){
		// 	echo "<p>". "Please Select an Image.". "</p>";
		// } else {
		// 	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		// 	$image_name = $_FILES['image']['name'];
		// 	$image_size = fileimagesize($_FILES['image']['tmp_name']);

		// 	if ($image_size == FALSE)
		// 		echo "That's not an image";
		// 	 else (){
		// 		if (!$insert = mysql_query("INSERT INTO image VALUES ('','$image','$image')"))
		// 			echo "Problem uploading image.";
		// 		else{
		// 			$lastid = mysql_insert_id();
		// 			echo "Image uploaded.<p />Your Image:<p /><img src=get.php?id=$lastid>";
		// 		}
		// 	}	
		// }




	?>	

<?php require "footer.php";?>
</body>

</html>