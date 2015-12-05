
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Flight</h3>
            </div>
            <div class="row">
                <p>
                    <a href="flight_create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Flight Number</th>
                      <th>Airline</th>
                      <th>Departure</th>
                      <th>Arrival</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include '../ecomm_connect.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM flight ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<td>'. $row['number'] . '</td>';
                            echo '<td>'. $row['airline'] . '</td>';
                            echo '<td>'. $row['depart'] . '</td>';
                            echo '<td>'. $row['arrive'] . '</td>';
                            
                            echo '<td width=250>';
                                echo '<a class="btn" href="flight_read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="flight_update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="flight_delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>