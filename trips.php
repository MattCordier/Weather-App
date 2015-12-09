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
					  	<select class="form-control" id="sel1">

					  		<?php
			                   $sql = 'SELECT * FROM style ORDER BY name';
			                   foreach ($pdo->query($sql) as $row) {
			                            echo '<option>'. $row['name'] . '</option>';
			                   }
			                ?>
					    	
					  	</select>
					</div>
                </div>
                <div class="col-xs-6">
                	<div class="form-group">
  						<label for="sel1">Destination:</label>
  						<select class="form-control" id="sel1">
							<?php
			                   $sql = 'SELECT * FROM destination ORDER BY name';
			                   foreach ($pdo->query($sql) as $row) {
			                            echo '<option>'. $row['name'] . '</option>';
			                   }
			                ?>
						</select>
					</div>
				</div>
                  
           
        </div>
    </div> <!-- /container -->


					  		<?php Database::disconnect(); ?>

<?php require "footer.php";?>
</body>

</html>