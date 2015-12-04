<?php
     
    require '../ecomm_connect.php';
 
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

       
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO payment (full_name, card_number, card_security, expires_month, expires_year, payment_type) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($full_name, $card_number, $card_security, $expires_month, $expires_year, $payment_type));
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
                        <h3>Create a Payment</h3>
                    </div>
             
                    <form class="form-horizontal" action="payment_create.php" method="post">


                      <div class="control-group <?php echo !empty($full_nameError)?'error':'';?>">
                        <label class="control-label">Name on Card</label>
                        <div class="controls">
                            <input name="full_name" type="text"  placeholder="Full Name" value="<?php echo !empty($full_name)?$full_name:'';?>">
                            <?php if (!empty($full_nameError)): ?>
                                <span class="help-inline"><?php echo $full_nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($card_numberError)?'error':'';?>">
                        <label class="control-label">Card Number</label>
                        <div class="controls">
                            <input name="card_number" type="text"  placeholder="Card Number" value="<?php echo !empty($card_number)?$card_number:'';?>">
                            <?php if (!empty($card_numberError)): ?>
                                <span class="help-inline"><?php echo $card_numberError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($card_securityError)?'error':'';?>">
                        <label class="control-label">Security Code</label>
                        <div class="controls">
                            <input name="card_security" type="text" placeholder="Security Code" value="<?php echo !empty($card_security)?$card_security:'';?>">
                            <?php if (!empty($card_securityError)): ?>
                                <span class="help-inline"><?php echo $card_securityError;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($expires_monthError)?'error':'';?>">
                        <label class="control-label">Expiration Month</label>
                        <div class="controls">
                            <input name="expires_month" type="text"  placeholder="Exp. Month" value="<?php echo !empty($expires_month)?$expires_month:'';?>">
                            <?php if (!empty($expires_monthError)): ?>
                                <span class="help-inline"><?php echo $expires_monthError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($expires_yearError)?'error':'';?>">
                        <label class="control-label">Expiration Year</label>
                        <div class="controls">
                            <input name="expires_year" type="text"  placeholder="Exp. Year" value="<?php echo !empty($expires_year)?$expires_year:'';?>">
                            <?php if (!empty($expires_yearError)): ?>
                                <span class="help-inline"><?php echo $expires_yearError;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="control-group <?php echo !empty($payment_typeError)?'error':'';?>">
                        <label class="control-label">Payment Type</label>
                        <div class="controls">
                            <input name="payment_type" type="text"  placeholder="Payment Type" value="<?php echo !empty($payment_type)?$payment_type:'';?>">
                            <?php if (!empty($payment_typeError)): ?>
                                <span class="help-inline"><?php echo $payment_typeError;?></span>
                            <?php endif;?>
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