<!DOCTYPE html>
<html>
<?php require "header.php";?>
<?php require "ecomm_connect.php";?>
<body>
<?php require "navigation.php";?>
 <div class="container">
            <div class="row">
                <h3>Trip</h3>
            </div>
            <div class="row">
                <p>
                    <a href="trip_create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Trip Name</th>
                      
                      <th>Description</th>
                      <th>Style</th>
                      <th>Destination</th>

                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include '../ecomm_connect.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM trip JOIN style ON style_id = style.id ORDER BY trip.id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<td>'. $row['name'] . '</td>'; 
                            echo '<td>'. $row['description'] . '</td>';
                            echo '<td>'. $row['style_id'] . '</td>';
                            echo '<td>'. $row['destination_id'] . '</td>';
                            
                            echo '<td width=250>';
                                echo '<a class="btn" href="trip_read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="trip_update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="trip_delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
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