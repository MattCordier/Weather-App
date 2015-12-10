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
			$image = file_get_contents($_FILES['image']['tmp_name']);
			echo $image;

		}




	?>	

<?php require "footer.php";?>
</body>

</html>