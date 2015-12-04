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
        $full_nameError = null;
        $card_numberError = null;
        $card_securityError = null;
        $expires_monthError = null;
        $expires_yearError = null;
        $payment_typeError = null;
        
      
         
        // keep track post values
        $full_name = $_POST['full_name'];
        $card_number = $_POST['card_number'];
        $card_security = $_POST['card_security'];
        $expires_month = $_POST['expires_month'];
        $expires_year = $_POST['expires_year'];
        $payment_type = $_POST['payment_type'];

        // validate input
        $valid = true;
        if (empty($full_name)) {
            $full_nameError = 'Please enter Full Name on Card';
            $valid = false;
        }

        if (empty($card_number)) {
            $card_numberError = 'Please enter Card Number';
            $valid = false;
        }
         
        if (empty($card_security)) {
            $card_securityError = 'Please enter Security Code';
            $valid = false;
        } 
         
        if (empty($expires_month)) {
            $expires_monthError = 'Please enter Expiration Month';
            $valid = false;
        }

        if (empty($expires_year)) {
            $usernameError = 'Please enter Expiration Year';
            $valid = false;
        }

        if (empty($payment_type)) {
            $payment_typeError = 'Please enter Payment Type';
            $valid = false;
        }

        //update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE payment set full_name = ?, card_number = ?, card_security = ?, expires_month = ?, expires_year = ?, payment_type = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($firstname, $full_name, $card_number, $card_security, $expires_month, $expires_year, $payment_type));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM payment where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $full_name = $data['full_name'];
        $card_number = $data['card_number'];
        $card_security = $data['card_security'];
        $expires_month = $data['expires_month'];
        $expires_year = $data['expires_year'];
        $payment_type = $data['payment_type'];
        Database::disconnect(); 
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
                        <h3>Update a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="payment_update.php?id=<?php echo $id?>" method="post">


                      <div class="control-group <?php echo !empty($firstnameError)?'error':'';?>">
                        <label class="control-label">Full Name</label>
                        <div class="controls">
                            <input name="firstname" type="text"  placeholder="Name" value="<?php echo !empty($firstname)?$firstname:'';?>">
                            <?php if (!empty($firstnameError)): ?>
                                <span class="help-inline"><?php echo $firstnameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($lastnameError)?'error':'';?>">
                        <label class="control-label">Card Number</label>
                        <div class="controls">
                            <input name="lastname" type="text"  placeholder="Last Name" value="<?php echo !empty($lastname)?$lasstname:'';?>">
                            <?php if (!empty($lasstnameError)): ?>
                                <span class="help-inline"><?php echo $lasstnameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">
                        <label class="control-label">Security Code</label>
                        <div class="controls">
                            <input name="phone" type="text" placeholder="Phone Number" value="<?php echo !empty($phone)?$phone:'';?>">
                            <?php if (!empty($phoneError)): ?>
                                <span class="help-inline"><?php echo $phoneError;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($dobError)?'error':'';?>">
                        <label class="control-label">Exp. Month</label>
                        <div class="controls">
                            <input name="dob" type="text"  placeholder="Date of Birth" value="<?php echo !empty($dob)?$dob:'';?>">
                            <?php if (!empty($dobError)): ?>
                                <span class="help-inline"><?php echo $dobError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($usernameError)?'error':'';?>">
                        <label class="control-label">Exp. Year</label>
                        <div class="controls">
                            <input name="username" type="text"  placeholder="Username" value="<?php echo !empty($username)?$username:'';?>">
                            <?php if (!empty($usernameError)): ?>
                                <span class="help-inline"><?php echo $usernameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">Payment Type</label>
                        <div class="controls">
                            <input name="password" type="text"  placeholder="Password" value="<?php echo !empty($password)?$password:'';?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif;?>
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