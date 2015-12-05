<?php
     
    require '../ecomm_connect.php';
 
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
            $departError = 'Please enter Departure Time';
            $valid = false;
        }

        if (empty($arrive)) {
            $arriveError = 'Please enter Arrival Time';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO flight (flight_number, airline, depart, arrive) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array(flight_number, airline, depart, arrive));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Flight </h3>
                    </div>
             
                    <form class="form-horizontal" action="flight_create.php" method="post">
                      <div class="control-group <?php echo !empty($flight_numberError)?'error':'';?>">
                        <label class="control-label">Flight Number</label>
                        <div class="controls">
                            <input name="flight_number" type="text"  placeholder="Flight Number" value="<?php echo !empty($flight_number)?$flight_number:'';?>">
                            <?php if (!empty($flight_numberError)): ?>
                                <span class="help-inline"><?php echo $flight_numberError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($airlineError)?'error':'';?>">
                        <label class="control-label">Airline</label>
                        <div class="controls">
                            <input name="airline" type="text"  placeholder="Airline" value="<?php echo !empty($airline)?$airline:'';?>">
                            <?php if (!empty($airlineError)): ?>
                                <span class="help-inline"><?php echo $airlineError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($departError)?'error':'';?>">
                        <label class="control-label">Depart</label>
                        <div class="controls">
                            <input name="depart" type="text"  placeholder="Depart" value="<?php echo !empty($depart)?$depart:'';?>">
                            <?php if (!empty($departError)): ?>
                                <span class="help-inline"><?php echo $departError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($arriveError)?'error':'';?>">
                        <label class="control-label">Arrive</label>
                        <div class="controls">
                            <input name="arrive" type="text"  placeholder="Arrive" value="<?php echo !empty($arrive)?$arrive:'';?>">
                            <?php if (!empty($arriveError)): ?>
                                <span class="help-inline"><?php echo $arriveError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
