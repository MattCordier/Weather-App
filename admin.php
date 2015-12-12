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
		// 		echo "Image Uploaded. Your Image: <img scr=get.php?=$lastid>";
		// 	}
		// }


	?>	

<?php require "footer.php";?>
</body>

</html>