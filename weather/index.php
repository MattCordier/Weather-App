<?php
ini_set('error_reporting', E_ALL);

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start(); 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Matt Cordier">
        <meta name="description" content="A smart weather app for planning your travels.">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/styles" href="assets/css/styles.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        
    </head>
    <body>
        <div class="container-fluid">
            <div class="row header">
                <div class="col-xs-4">
                    <button type="button" class="btn btn-default">LogIn</button>

                </div>
                <div class="col-xs-4">
                    <form>
                        <input class="location-search" type="text" name="#" value="Select a Location">
                    </form>
                    
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-default">Calendar</button>
                </div>
            </div>
            <div class="row weather-map" style="height:100%; width:100%;" >
                <div class="col-xs-12" style="height:100%; width:100%;">
                    <div id="map">
                    </div>
                </div>
            </div> 
    

        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <div id="login-modal">
            <form action="includes/process_login.php" method="post" name="login_form">                      
                Email: <input type="text" name="email" />
                <br/>
                Password: <input type="password" 
                                 name="password" 
                                 id="password"/>
                <input type="button" 
                       value="Login" 
                       onclick="formhash(this.form, this.form.password);" /> 
            </form>
        </div>    
 
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>Don't have an account? <a href='register.php'>Register here</a></p>";
                }
?>  

        <script src="js/maps.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWIEjUkuuJx_OrEqaswU4SEYqaSl13Pek&sensor=false&callback=initMap"></script>

    </div>    
    </body>
</html>
