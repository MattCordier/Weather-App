<!DOCTYPE html>
<html>
<?php require "header.php";?>
<?php include 'ecomm_connect.php';
    $pdo = Database::connect();
?>
<body>
<?php require "navigation.php";?>
 	<div class="container main-bg">
        <div class="row">
            <h3>Select a Trip</h3>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
					<label for="sel1">Hiker Style:</label>
					  <select id="style" class="form-control">
					  	<option value="all" selected="selected"> All </option>
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
						<option value="all" selected="selected"> All </option>
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
    		var destination = $("#destination").val();
    		var style = $("#style").val();
    		$.get("get_trip.php?style=" + style + "&destination=" + destination, function(data){
    			if(data !== null && data.length > 5){
    				$('#trips').html(data);
    			} else {
					$('#trips').html("We don't have any trips like that available at this time.");
    			}
    			
    		}); 
    	}
    	search();
    });            	
</script>
</body>

</html>