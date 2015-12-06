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
            $sql = "INSERT INTO trip (name, cost, description, subcategory_id) values(?, ?, ?, ?)";
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
             
                   
                 
    </div> <!-- /container -->
  </body>
</html>
