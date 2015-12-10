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


		if(!isset($file)){
			echo "<p>". "Please Select an Image.". "</p>";
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = $_FILES['image']['name'];
			$image_size = fileimagesize($_FILES['image']['tmp_name']);

			if ($image_size == FALSE){
				echo "That's not an image";
			}	
		}




	?>	

<?php require "footer.php";?>
</body>

</html>