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
        $sql = "SELECT * FROM address where id = ?";
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
                        <h3>Read Addres</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Street One</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['street_one'];?>
                            </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Street Two</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['street_two'];?>
                            </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Zipcode</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['zipcode'];?>
                            </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">City</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['city'];?>
                            </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">State</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['state'];?>
                            </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Country</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['country'];?>
                            </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-actions">
                        <a class="btn" href="index.php">Back</a>
                    </div>

                </div>
                 
    </div> <!-- /container -->
  </body>
</html>