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
        $@@Error = null;
        $@@Error = null;
        $@@Error = null;
         
        // keep track post values
        $@@ = $_POST['@@'];
        $@@ = $_POST['@@'];
         
        // validate input
        $valid = true;
        if (empty($@@)) {
            $nameError = 'Please enter @@';
            $valid = false;
        }
         
        if (empty($@@)) {
            $nameError = 'Please enter @@';
            $valid = false;
        }
        if (empty($@@)) {
            $nameError = 'Please enter @@';
            $valid = false;
        }
        if (empty($@@)) {
            $nameError = 'Please enter @@';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE @@  set @@ = ?, @@ = ?, @@ =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($@@,$@@,$@@,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM @@ where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $@@ = $data['@@'];
        $@@ = $data['@@'];
        $@@ = $data['@@'];
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
                        <h3>Update a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="@@_update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($@@Error)?'error':'';?>">
                        <label class="control-label">@@</label>
                        <div class="controls">
                            <input name="@@" type="text"  placeholder="@@" value="<?php echo !empty($@@)?$@@:'';?>">
                            <?php if (!empty($@@Error)): ?>
                                <span class="help-inline"><?php echo $@@Error;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="controls">
                            <input name="@@" type="text"  placeholder="@@" value="<?php echo !empty($@@)?$@@:'';?>">
                            <?php if (!empty($@@Error)): ?>
                                <span class="help-inline"><?php echo $@@Error;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="controls">
                            <input name="@@" type="text"  placeholder="@@" value="<?php echo !empty($@@)?$@@:'';?>">
                            <?php if (!empty($@@Error)): ?>
                                <span class="help-inline"><?php echo $@@Error;?></span>
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

