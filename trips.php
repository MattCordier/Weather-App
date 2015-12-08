<!DOCTYPE html>
<html>
<?php require "header.php";?>
<?php require "ecomm_connect.php";?>
<body>
<?php require "navigation.php";?>
 <div class="container main-bg">
            <div class="row">
                <h3>Select a Trip</h3>
            </div>

            <div class="row">
                <p>
                    <a href="trip_create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  
                  <?php
                   include '../ecomm_connect.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT name FROM style ORDER BY name DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<td>'. $row['name'] . '</td>'; 
                            echo '<td>'. $row['description'] . '</td>';
                            echo '<td>'. $row['style.name'] . '</td>';
                            echo '<td>'. $row['destination_id'] . '</td>';
                            
                            echo '<select>'. 
  								<option value="volvo">Volvo</option>
								<option value="saab">Saab</option>
								<option value="mercedes">Mercedes</option>
								<option value="audi">Audi</option>
							</select>
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->

<?php require "footer.php";?>
</body>

</html>