<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');


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
            <header id="main-header">
        <?php 
            if (login_check($mysqli) == true) {
                echo '<p class="user-stats">Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.&nbsp</p>';
                echo '<p class="user-stats">Do you want to change user? <a href="includes/logout.php">Log out</a>.&nbsp</p>';
            } else {
                echo '<p class="user-stats">Currently logged ' . $logged . '.&nbsp</p>';
                echo "<p class='user-stats'>Don't have an account? <a id='register' href='register.php'>Register here</a>&nbsp</p>";
              }
        ?>   
                <a href="login.php" class="login-link">login</a>         
            </header>

        <div id="weather" class="container">    
            <div class="row">
                <div class="twelve columns">
                    <thead>
                    <tr>
                      <th>Date</th>
                      <th>Location</th>
                      <th>High</th>
                      <th>Low</th>
                      <th>Summary</th> 
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include_once 'includes/db_connect.php';
                    include_once 'includes/psl-config.php';
                   $stmt = $mysqli->prepare("SELECT * FROM locations");

                   // $stmt->bind_param();

                   $stmt->execute();

                   $result = $stmt->get_result();

                   while($row = $result->fetch_all()) {
                        print($row);
                        // $results[] = $row;
                            // echo '<td>'. $row['date'] . '</td>';
                            // echo '<td>'. $row['address'] . '</td>';
                            // echo '<td>'. $row['high'] . '</td>';
                            // echo '<td>'. $row['low'] . '</td>';
                            // echo '<td>'. $row['summary'] . '</td>';
                            
                            // echo '<td width=250>';
                            //     echo '<a class="btn" href="trip_read.php?id='.$row['id'].'">Read</a>';
                            //     echo ' ';
                            //     echo '<a class="btn btn-success" href="trip_update.php?id='.$row['id'].'">Update</a>';
                            //     echo ' ';
                            //     echo '<a class="btn btn-danger" href="trip_delete.php?id='.$row['id'].'">Delete</a>';
                            //     echo '</td>';
                            // echo '</tr>';
                   }
                   $result->close();
                    // print_r($results);                  
                    ?>
                  </tbody>
            </table>

                </div>
                <!-- <div class="six columns">beautiful</div> -->
            </div>
        </div>

        
    <footer id="main-footer">
            <p class="foot-deets">Weather App developed by <a href="http://mattcordier.github.io" target="_blank">Matt Cordier.</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Powered by <a href="http://forecast.io" target="_blank">Forecast.</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matt Cordier &copy; 2016</p>
        </footer>
        </div>
           
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/maps.js"></script>
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script> 
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWIEjUkuuJx_OrEqaswU4SEYqaSl13Pek&libraries=places"></script>   
    </body>
</html>   