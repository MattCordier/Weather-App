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
<html >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Matt Cordier">
        <meta name="description" content="A smart weather app for planning your travels.">
        <link rel="stylesheet" href="assets/css/skeleton.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.structure.css">
        <link rel="stylesheet" type="text/styles" href="assets/css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">        

        <link rel="stylesheet" type="text/styles" href="assets/css/weather-icons.min.css">
        <link rel="stylesheet" type="text/styles" href="assets/css/weather-icons-wind.min.css">

        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>        <!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->    
    </head>
    <body>
        <div class="wrapper">

<?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
            <div > 
                <form action="includes/process_login.php" method="post" name="login_form">                      
                    Email: <input type="text" name="email" />
                    <br/>
                    Password: <input type="password"  name="password" id="password"/>
                    <br/>
                    <input class="btn btn-default login-btn" type="button" value="Login" onclick="formhash(this.form, this.form.password);" /> 
                </form>
            </div>
           
 
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.';
 
            echo 'Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged;
                        echo "Don't have an account? <a id='register' href='register.php'>Register here</a></p>";
                }

?>
        </div>
        <footer id="main-footer">
            <p class="foot-deets">Weather App developed by <a href="http://mattcordier.github.io" target="_blank">Matt Cordier.</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Powered by <a href="http://forecast.io" target="_blank">Forecast.</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matt Cordier &copy; 2016</p>
        </footer>
           
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
        <script src="assets/js/app.js"></script>
       <!-- <script src="assets/js/maps.js"></script> -->
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script> 
      <!--   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWIEjUkuuJx_OrEqaswU4SEYqaSl13Pek&libraries=places"></script>   -->
    </body>
</html>