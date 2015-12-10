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
        		<div id="trips" class="col-xs-12">
	        		<?php	
	        			$sql = 'SELECT * FROM trip ORDER BY name';
	        			foreach ($pdo->query($sql) as $row) {
	        				echo '<div class="col-xs-4">';
	        				echo '<p>'.$row['name'].'</p>';
	        				echo '<p>'.$row['description'].'</p>';
	        				echo '<p>'.'$'.$row['cost'].'</p>';
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
		$("#style").on("change", search);
    	$("#destination").on("change", search);

    	function search(){
    		var destination = $("#style").value;
    		var style = $("#style").value;
    		console.log("retrieving filtered results for " + destination + " & " + style);
    		$.get("get_trip.php?style=" + style + "&destination=" + destination, function(data){
    			$('#trips').html(data);
    		}); 
    	}
    });            	
</script>
</body>

</html>