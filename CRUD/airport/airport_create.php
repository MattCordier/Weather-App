<?php
     
    require '../ecomm_connect.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $phoneError = null;
        $address_idError = null;
        
        
      
         
        // keep track post values
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address_id = $_POST['address_id'];
       
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Airport Name';
            $valid = false;
        }
        if (empty($phone)) {
            $phoneError = 'Please enter Airport Phone';
            $valid = false;
        }
        if (empty($address_id)) {
            $address_idError = 'Please enter Airport ID';
            $valid = false;
        }

        

       
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO airport (name, phone, address_id) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name, $phone, $address_id));
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
                        <h3>Create an Airport</h3>
                    </div>
             
                    <form class="form-horizontal" action="airport_create.php" method="post">


                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Enter Airport</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Airport Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">
                        <label class="control-label">Enter Airport Phone</label>
                        <div class="controls">
                            <input name="phone" type="text"  placeholder="Airport Phone" value="<?php echo !empty($phone)?$phone:'';?>">
                            <?php if (!empty($phoneError)): ?>
                                <span class="help-inline"><?php echo $phoneError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($address_idError)?'error':'';?>">
                        <label class="control-label">Enter Airport Address ID</label>
                        <div class="controls">
                            <input name="address_id" type="text"  placeholder="Address ID" value="<?php echo !empty($address_id)?$address_id:'';?>">
                            <?php if (!empty($address_idError)): ?>
                                <span class="help-inline"><?php echo $address_idError;?></span>
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