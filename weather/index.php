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
        <link rel="stylesheet" type="text/styles" href="assets/css/weather-icons.min.css">
        <link rel="stylesheet" type="text/styles" href="assets/css/weather-icons-wind.min.css">

        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>        <!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->    
    </head>
    <body>

            <div id="map">
            </div>
            
            <div class="map-overlay">
            </div>


        <div class="wrapper"> 
            <h1 id="app-title">Weather App</h1> 
                
            <div id="weather" class="container">
          
                <div id="weather-current" class="row">
            
                </div>
                <!-- <div id="weather-hourly" >
          
                </div>
                <div id="weather-outlook" >
            
                </div> -->
            
            
                <div class="row weather-footer">
                    <div class="twelve columns">  
<i class="wi wi-solar-eclipse"></i> 
                        <input id="address" class="location-search" type="text" name="#"  placeholder="Where are you going?" >
                        <button id="submit" class="btn btn-default" type="button">Go!</button>
                        <input type="text" id="datepicker"  placeholder="When are you going?">
                    </div>
                </div>
            
            </div>
        </div>
           
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/maps.js"></script>
        <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
        <script type="text/JavaScript" src="assets/js/forms.js"></script> 
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWIEjUkuuJx_OrEqaswU4SEYqaSl13Pek&callback=initMap"></script>   
    </body>
</html>
