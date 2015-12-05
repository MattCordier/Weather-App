<?php
     
    require '../ecomm_connect.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $street_oneError = null;
        $street_two = null;
        $zipcode = null;
        $city = null;
        $state = null;
        $country = null;
        
        // keep track post values
        $street_one = $_POST['street_one'];
        $street_two = $_POST['street_two'];
        $zipcode = $_POST['zipcode'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
       
        // validate input
        $valid = true;
        if (empty($street_one)) {
            $street_oneError = 'Please enter Street Name';
            $valid = false;
        }
        if (empty($street_two)) {
            $street_twoError = 'Please enter Street2 Name';
            $valid = false;
        }
        if (empty($zipcode)) {
            $zipcodeError = 'Please enter Zipcode';
            $valid = false;
        }
        if (empty($city)) {
            $cityError = 'Please enter City';
            $valid = false;
        }
        if (empty($state)) {
            $stateError = 'Please enter State';
            $valid = false;
        }
        if (empty($country)) {
            $countryError = 'Please enter Country';
            $valid = false;
        }
                

       
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO address (street_one, street_two, zipcode, city, state, country) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($street_one, $street_two, $zipcode, $city, $state, $country));
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
                        <h3>Create an Address</h3>
                    </div>
             
                    <form class="form-horizontal" action="address_create.php" method="post">


                      <div class="control-group <?php echo !empty($street_oneError)?'error':'';?>">
                        <label class="control-label">Enter Street One</label>
                        <div class="controls">
                            <input name="street_one" type="text"  placeholder="Street One" value="<?php echo !empty($street_one)?$street_one:'';?>">
                            <?php if (!empty($street_oneError)): ?>
                                <span class="help-inline"><?php echo $street_oneError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($street_twoError)?'error':'';?>">
                        <label class="control-label">Enter Street Two</label>
                        <div class="controls">
                            <input name="street_two" type="text"  placeholder="Street Two" value="<?php echo !empty($street_two)?$street_two:'';?>">
                            <?php if (!empty($street_twoError)): ?>
                                <span class="help-inline"><?php echo $street_twoError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($zipcodeError)?'error':'';?>">
                        <label class="control-label">Enter Zipcode</label>
                        <div class="controls">
                            <input name="zipcode" type="text"  placeholder="Zipcode" value="<?php echo !empty($zipcode)?$zipcode:'';?>">
                            <?php if (!empty($zipcodeError)): ?>
                                <span class="help-inline"><?php echo $zipcodeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
                        <label class="control-label">Enter City</label>
                        <div class="controls">
                            <input name="city" type="text"  placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
                            <?php if (!empty($cityError)): ?>
                                <span class="help-inline"><?php echo $cityError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($stateError)?'error':'';?>">
                        <label class="control-label">Enter State</label>
                        <div class="controls">
                            <input name="state" type="text"  placeholder="State" value="<?php echo !empty($state)?$state:'';?>">
                            <?php if (!empty($stateError)): ?>
                                <span class="help-inline"><?php echo $stateError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($countryError)?'error':'';?>">
                        <label class="control-label">Enter Country</label>
                        <div class="controls">
                            <input name="country" type="text"  placeholder="Country" value="<?php echo !empty($country)?$country:'';?>">
                            <?php if (!empty($cityError)): ?>
                                <span class="help-inline"><?php echo $countryError;?></span>
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