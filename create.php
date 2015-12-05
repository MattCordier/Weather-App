<?php
     
    require '../ecomm_connect.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $Error = null;
        $Error = null;
        $Error = null;
         
        // keep track post values
        $ = $_POST[''];
        $ = $_POST[''];
        $ = $_POST[''];
         
        // validate input
        $valid = true;
        if (empty($)) {
            $Error = 'Please enter ';
            $valid = false;
        }
         
        if (empty($)) {
            $Error = 'Please enter ';
            $valid = false;
        } 
         
        if (empty($)) {
            $Error = 'Please enter ';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (@@,@@,@@) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($,$,$));
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
                        <h3>Create a </h3>
                    </div>
             
                    <form class="form-horizontal" action="_create.php" method="post">
                      <div class="control-group <?php echo !empty($@@Error)?'error':'';?>">
                        <label class="control-label"></label>
                        <div class="controls">
                            <input name="@@" type="text"  placeholder="@@" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($@@Error)): ?>
                                <span class="help-inline"><?php echo $@@Error;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($@@Error)?'error':'';?>">
                        <label class="control-label"></label>
                        <div class="controls">
                            <input name="@@" type="text"  placeholder="@@" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($@@Error)): ?>
                                <span class="help-inline"><?php echo $@@Error;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($@@Error)?'error':'';?>">
                        <label class="control-label"></label>
                        <div class="controls">
                            <input name="@@" type="text"  placeholder="@@" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($@@Error)): ?>
                                <span class="help-inline"><?php echo $@@Error;?></span>
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
