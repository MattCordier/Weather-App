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
                
                <div class="col-xs-6">
                	<div class="form-group">
					  	<label for="sel1">Hiker Style:</label>
					  	<select id="style" class="form-control">
					  		<option selected="selected"> All </option>
					  		<?php
					  			 
			                   	$sql = 'SELECT * FROM style ORDER BY name';
			                   	foreach ($pdo->query($sql) as $row) {
			                            echo '<option value=" ' .$row['id']. ' ">'. $row['name'] . '</option>';
			                   }
			                ?>
					    	
					  	</select>
					</div>
                </div>
                <div class="col-xs-6">
                	<div class="form-group">
  						<label for="sel1">Destination:</label>
  						<select id="destination" class="form-control">
  							<option selected="selected"> All </option>
							<?php
			                   $sql = 'SELECT * FROM destination ORDER BY name';
			                   foreach ($pdo->query($sql) as $row) {
			                            echo '<option value=" ' .$row['id']. ' ">'. $row['name'] . '</option>';
			                   }
			                ?>
						</select>
					</div>
				</div>   
        	</div><!--end row-->
        	<div class="row">
        		<div class="col-xs-12">
	        		<?php	
	        			$sql = 'SELECT * FROM trip WHERE style_id = 1 AND destination_id = 3 ORDER BY name';
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
<script>
    $(document).ready(function(){
		$("#style").on("change", function(){
    		alert ("you selected" + " " + this.value); 
    	});
    	$("#destination").on("change", function(){
    		alert ("you selected" + " " + this.value); 
    	});
    });            	
</script>
</body>

</html>