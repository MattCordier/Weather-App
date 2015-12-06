<?php
    require '../ecomm_connect.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $flight_numberError = null;
        $airlineError = null;
        $departError = null;
        $arriveError = null;
         
        // keep track post values
        $flight_number = $_POST['flight_number'];
        $airline = $_POST['airline'];
        $depart = $_POST['depart'];
        $arrive = $_POST['arrive'];

        // validate input
        $valid = true;
        if (empty($flight_number)) {
            $flight_numberError = 'Please enter Flight Number';
            $valid = false;
        }
         
        if (empty($airline)) {
            $airlineError = 'Please enter Airline';
            $valid = false;
        }
        if (empty($depart)) {
            $departError = 'Please enter Depart';
            $valid = false;
        }
        if (empty($arrive)) {
            $arriveError = 'Please enter Arrive';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE flight  set flight_number = ?, airline = ?, depart =?, arrive = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($flight_number, $airline, $depart, $arrive, $id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM flight where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $flight_number = $data['flight_number'];
        $airline = $data['airline'];
        $depart = $data['depart'];
        $arrive = $data['arrive']
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Flight</h3>
                    </div>
             
                    
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

