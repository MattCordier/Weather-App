<?php
    require '../ecomm_connect.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM payment where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Customer</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Full Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['full_name'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Card Number</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['card_number'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Security Code</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['security_code'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">expiration Month</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['expires_month'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">expiration Year</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['expires_year'];?>
                            </label>
                        </div>
                        <div class="control-group">
                        <label class="control-label">Payment Type</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['payment_type'];?>
                            </label>
                        </div>
                      </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>