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
        <link rel="stylesheet" type="text/styles" href="assets/css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">       

        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>        
        <!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->    
    </head>
    <body class="dashboard-bg">  
        <div class="wrapper"> 
            <header id="main-header">
        <?php 
            if (login_check($mysqli) == true) {
                echo '<p class="user-stats">Logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.&nbsp';
                echo 'Change user? <a href="includes/logout.php">Log out</a>.&nbsp';
                echo '<a href="index.php" class="login-link">view map</a></p>';
            } else {
                echo '<p class="user-stats">Currently logged ' . $logged . '.&nbsp';
                echo "Don't have an account? <a id='register' href='register.php'>Register here</a>&nbsp";
                echo '<a href="dashboard.php" class="login-link">login</a></p>';

              }
        ?>    
            </header>

        <div id="weather" class="container dashboard-container">    
            <div class="row weather-table">
                <div class="twelve columns">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Location</th>
                                <th>High</th>
                                <th>Low</th>
                                <th>Summary</th> 
                                <th>Remove</th>
                            </tr>
                        </thead>
                    <tbody>
                <?php
                    $id = $_SESSION['user_id'];
                    $count = $mysqli->prepare("SELECT COUNT(members_id) FROM locations WHERE members_id = ?");
                    $count->bind_param('i', $id);
                    $count->execute();
                    $count_result = $count->get_result();

                    while($count_row = $count_result->fetch_assoc()){
                        print_r($count_row);
                        echo $count_row[COUNT('members_id')][0];
                    }
                    

                    // $stmt = $mysqli->prepare("SELECT * FROM locations WHERE members_id = ?");
                    // $stmt->bind_param('i', $id);
                    // $stmt->execute();
                    // $result = $stmt->get_result();

                    // while($row = $result->fetch_assoc()) {
                    //     echo '<tr>';                        
                    //     echo '<td class="table-date">'. $row['date'] . '</td>';
                    //     echo '<td>'. $row['address'] . '</td>';
                    //     echo '<td>'. $row['high'] . '</td>';
                    //     echo '<td>'. $row['low'] . '</td>';
                    //     echo '<td>'. $row['summary'] . '</td>';
                    //     echo '<td><button class="btn-remove" id='. $row['ID'] .'>X</button></td>';
                    //     echo '</tr>';    
                    // }
                    // print_r($count);
                    // $result->close();
                ?>
                    </tbody>
                    </table>

                </div><!--end column-->
            </div><!--end row-->
            <div class="row weather-footer">

                    <div class="twelve columns"> 

                        

                    </div>

                </div>
                <div id="alert"></div>
        </div><!--end container-->

        
    <footer id="main-footer">
            <p class="foot-deets">Weather App developed by <a href="http://mattcordier.github.io" target="_blank">Matt Cordier.</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Powered by <a href="http://forecast.io" target="_blank">Forecast.</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matt Cordier &copy; 2016</p>
        </footer>
    </div><!--end wrapped-->
           
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script> 
        
    </body>
</html>   