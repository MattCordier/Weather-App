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
        $arrive = $data['arrive'];
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
             
                    <form class="form-horizontal" action="flight_update.php?id=<?php echo $id?>" method="post">

                      <div class="control-group <?php echo !empty($flight_numberError)?'error':'';?>">
                        <label class="control-label">Flight Number</label>
                        <div class="controls">
                            <input name="flight_number" type="text"  placeholder="Flight Number" value="<?php echo !empty($flight_number)?$flight_number:'';?>">
                            <?php if (!empty($flight_numberError)): ?>
                                <span class="help-inline"><?php echo $flight_numberError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="controls">
                            <input name="airline" type="text"  placeholder="Airline" value="<?php echo !empty($airline)?$airline:'';?>">
                            <?php if (!empty($airlineError)): ?>
                                <span class="help-inline"><?php echo $airlineError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="controls">
                            <input name="depart" type="text"  placeholder="Depart" value="<?php echo !empty($depart)?$depart:'';?>">
                            <?php if (!empty($departError)): ?>
                                <span class="help-inline"><?php echo $departError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="controls">
                            <input name="arrive" type="text"  placeholder="Arrive" value="<?php echo !empty($arrive)?$arrive:'';?>">
                            <?php if (!empty($arriveError)): ?>
                                <span class="help-inline"><?php echo $arriveError;?></span>
                            <?php endif; ?>
                        </div>
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

