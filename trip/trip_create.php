<?php
     
    require '../ecomm_connect.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $costError = null;
        $descriptionError = null;
        $subcategory_idError = null;

        // keep track post values
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $description = $_POST['description'];
        $subcategory_id = $_POST['subcategory_id']; 
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($cost)) {
            $costError = 'Please enter Cost';
            $valid = false;
        } 
         
        if (empty($description)) {
            $descriptionError = 'Please enter Description';
            $valid = false;
        }

        if (empty($subcategory_id)) {
            $subcategoryError = 'Please enter Subcategory ID';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (name, cost, description, subcategory_id) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name, $cost, $description, $subcategory_id));
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
                        <h3>Create a Trip</h3>
                    </div>
             
                    <form class="form-horizontal" action="trip_create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($costError)?'error':'';?>">
                        <label class="control-label">Cost</label>
                        <div class="controls">
                            <input name="cost" type="text"  placeholder="cost" value="<?php echo !empty($cost)?$cost:'';?>">
                            <?php if (!empty($costError)): ?>
                                <span class="help-inline"><?php echo $costError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                        <label class="control-label"></label>
                        <div class="controls">
                            <input name="description" type="text"  placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
                            <?php if (!empty($descrptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($subcategory_idError)?'error':'';?>">
                        <label class="control-label"></label>
                        <div class="controls">
                            <input name="subcategory_id" type="text"  placeholder="Subcategory ID" value="<?php echo !empty($subcategory_id)?$subcategory_id:'';?>">
                            <?php if (!empty($subcategory_idError)): ?>
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
