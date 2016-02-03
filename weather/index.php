
<!DOCTYPE html>
<html >
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
        <!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->
        
    </head>
    <body>
    
           
 


            
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
