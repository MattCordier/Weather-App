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
			echo "Please Select an Image.";
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = $_FILES['image']['name'];
			$image_size = fileimagesize($_FILES['image']['tmp_name']);
		}




	?>	

<?php require "footer.php";?>
</body>

</html>