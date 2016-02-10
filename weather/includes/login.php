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
<html ng-app="weatherApp">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Matt Cordier">
        <meta name="description" content="A smart weather app for planning your travels.">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.structure.css">
        <link rel="stylesheet" type="text/styles" href="assets/css/styles.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        
    </head>
    <body ng-app>
        <div class="container-fluid">
            <div class="row header">
                <div class="col-xs-4">
                    <button id="login" type="button" class="btn btn-default">LogIn</button>
                    <div id="login-modal">    
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
            <div > 
                <form action="includes/process_login.php" method="post" name="login_form">                      
                    Email: <input type="text" class="form-control login-input" name="email" />
                    <br/>
                    Password: <input type="password" class="form-control login-input" name="password" id="password"/>
                    <br/>
                    <input class="btn btn-default login-btn" type="button" value="Login" onclick="formhash(this.form, this.form.password);" /> 
                </form>
            </div>
           
 
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>Don't have an account? <a id='register' href='register.php'>Register here</a></p>";
                }
?>  
        </div> 

                </div>
                <div class="col-xs-4">
                    <div class="input-group">
                        <input id="address" class="form-control location-search" type="text" name="#"  placeholder="Where are you going?" >
                        <span class="input-group-btn">
                            <button id="submit" class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                    
                </div>
                <div class="col-xs-4">
                    
                    <input type="text" id="datepicker" class="form-control" placeholder="When are you going?">

                </div>
            </div>
            <div class="row weather-map" >
                <div class="col-sm-6 weather-window">
                    <div id="weather" ng-controller="CurrentWeatherCntrl">
                        {{weather.temp}}
                        <h2>Get the current weather for anywhere in the world!</h2>
                        <p>Enter a location in the search bar above, then tap GO!<p>
                    </div>
                </div>
                <div class="col-sm-6 map-window">
                    <div id="map">
                    </div>
                </div>
            </div> 
    
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>

        <script src="js/app.js"></script>
        <script src="js/maps.js"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWIEjUkuuJx_OrEqaswU4SEYqaSl13Pek&callback=initMap"></script>

    </div>    
    </body>
</html>