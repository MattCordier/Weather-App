<!DOCTYPE html>
<html>
<?php require "header.php";?>
<?php require "ecomm_connect.php";?>
<body>
<?php require "navigation.php";?>
<?php
	include '../ecomm_connect.php';
	$pdo = Database::connect();
?>

 	<div class="container main-bg">
            <div class="row">
                <h3>Select a Trip</h3>
            </div>

            <div class="row">
                <script>
                	function yo(value){
                		alert ("you selected" + this.value); 
                	}
                </script>
                <div class="col-xs-6">
                	<div class="form-group">
					  	<label for="sel1">Hiker Style:</label>
					  	<select class="form-control" value="all" onchange="yo(this.value)">
					  		<option selected="selected"> All </option>
					  		<?php
					  			$hiker = 
			                   	$sql = 'SELECT * FROM style ORDER BY name';
			                   	foreach ($pdo->query($sql) as $row) {
			                            echo '<option value="' .$row['id']. '">'. $row['name'] . '</option>';
			                   }
			                ?>
					    	
					  	</select>
					</div>
                </div>
                <div class="col-xs-6">
                	<div class="form-group">
  						<label for="sel1">Destination:</label>
  						<select class="form-control">
  							<option selected="selected"> All </option>
							<?php
			                   $sql = 'SELECT * FROM destination ORDER BY name';
			                   foreach ($pdo->query($sql) as $row) {
			                            echo '<option>'. $row['name'] . '</option>';
			                   }
			                ?>
						</select>
					</div>
				</div>   
        	</div><!--end row-->
        	<div class="row">
        		<div class="col-xs-12">
	        		<?php	
	        			$sql = 'SELECT * FROM trip ORDER BY name';
	        			foreach ($pdo->query($sql) as $row) {
	        				echo '<div class="col-xs-4">';
	        				echo '<p>'.$row['name'].'</p>';
	        				echo '<p>'.$row['description'].'</p>';
	        				echo '<p>'.$row['cost'].'</p>';
	        				echo '</div>';
	        			}
	        		?>
        		</div>
        	</div><!--end row-->
    </div> <!-- /container -->


					  		<?php Database::disconnect(); ?>

<?php require "footer.php";?>
</body>

</html>