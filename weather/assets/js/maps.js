"use strict";

var latlng;
var date; 



function initMap() {
    
    date = "";
    var mapOptions = {
        zoom: 13,
        zoomControl: false,
        streetViewControl: false,
        // center: {lat: 43.0500, lng: -87.9500},
        scrollwheel: false,
        mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.SATELLITE
       
    };
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        
    }
    else {
        console.log('Geolocation is not supported for this Browser/OS version yet.');
    }
    // Set up basic map view
    
    var geocoder = new google.maps.Geocoder();

    //run after user's location is determined
    
    
    predictWeather();

    // Keep Map centered on resize
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center); 
    });
    
    //run if user taps submit
    document.getElementById('submit').addEventListener('click', function() {
        geocodeAddress(geocoder, map);
    });
    //run if user hits enter
    $("#address").keypress(function(event) {
    if (event.which == 13) {
        event.preventDefault();
        geocodeAddress(geocoder, map);
    }
})
}

function showPosition(position) {
    latlng = [];
    console.log("Latitude: " + position.coords.latitude + 
    " Longitude: " + position.coords.longitude);
    latlng.push(position.coords.latitude);
        latlng.push(position.coords.longitude); 
}


function geocodeAddress(geocoder, resultsMap) {
	latlng = [];	
    date = document.getElementById('dp').value;
    var address = document.getElementById('address').value;
    console.log(date);
	
    geocoder.geocode({'address': address}, function(results, status) {
	    if (status === google.maps.GeocoderStatus.OK) {
	        resultsMap.setCenter(results[0].geometry.location);
	        latlng.push(results[0].geometry.location.lat());
	        latlng.push(results[0].geometry.location.lng()); 
	    } else {
	       alert('Geocode was not successful for the following reason: ' + status);
	      }
		predictWeather();		
    });
}

// function getWeather(){
// 	var apiKey = '8951bee95458c4ab8a6121ec2452207a';
//     var url = 'https://api.forecast.io/forecast/';
//     var lati = latlng[0];
//     var longi = latlng[1];
//     var currentContent = "";
//     var hourlyContent = "";
//     var dailyContent = "";
//     var data;

//     $.getJSON(url + apiKey + "/" + lati + "," + longi + "?callback=?", function(data) {
//               console.log(data);
//               currentContent += '<div class="six columns">';
//               currentContent += '<h1 class="weather-current">' + Math.round(data.currently.temperature) + '&deg;</h1></div>';
//               currentContent += '<div class="six columns"><p> High: ' + data.daily.data[0].temperatureMax + '&deg;</p>';
//               currentContent += '<p> Low: ' + data.daily.data[0].temperatureMin + '&deg;</p>';
//               currentContent += '<p> Percipitation: ' + (Math.floor(data.daily.data[0].precipProbability * 100)) + '&#37;</p></div>';
//             $('#weather-current').html(currentContent);
                


//                 // for (var i = 0; i < data.hourly.data.length; i++) {
//                 //     console.log(i);
//                 //     hourlyContent += '<h2>Temp: </h2>';
//                 //     hourlyContent += '<span>' + Math.round(data.hourly.data[i].temperature) + '</span>';
//                 //     hourlyContent += '<br/>';
//                 // };
//             $('#weather-hourly').html(hourlyContent);

//                 // for (var i = 0; i < data.daily.data.length; i++) {
//                 //     console.log("test " + dailyContent);
//                 //      dailyContent += '<span>' + data.daily.data[i].icon + '</span>';
//                 // }
//             $('#weather-outlook').html(dailyContent);
            

//     });
// }

function predictWeather(){
	var apiKey = '8951bee95458c4ab8a6121ec2452207a';
    var url = 'https://api.forecast.io/forecast/';
    var lati = latlng[0];
    var longi = latlng[1];
    var weatherHeader = "";
    var currentContent = "";
    var hourlyContent = "";
    var dailyContent = "";
    var data;

        //Check if datepicker(dp) has user input value 
        if (date !== ""){
            var selectedDate = new Date(date); 
            
        } else if (date === "") {
            var selectedDate = new Date();
        }

        //convert selectedDate to Unix code
        var time = Math.floor(selectedDate.getTime()/1000);
    
    
    // console.log(selectedDate);
    // console.log(time);

    $.getJSON(url + apiKey + "/" + lati + "," + longi + "," + time + "?callback=?", function(data) {
              console.log(data);
              weatherHeader += '<div class="twelve columns weather-header-col"><p class="p-date">' + selectedDate.toDateString() +'</p></div>';
              
              // 
              // CONTENT FOR LEFT DIV, OVERVIEW
              // 
              currentContent += '<div class="six columns">';
              currentContent += '<p class="weather-summary">' + data.currently.summary  + '&nbsp;&nbsp;|&nbsp;&nbsp;Feels like  ' + Math.round(data.currently.apparentTemperature) +'&deg;</p>'; 
              currentContent += '<h1 class="weather-current"><i class="wi wi-forecast-io-' + data.currently.icon + '" title="'+ data.currently.icon + '"></i>' + Math.round(data.currently.temperature) + '&deg;</h1>';
              currentContent += '<p class="p-hilo"><span class="label-hilo">High: </span>' + Math.round(data.daily.data[0].temperatureMax) + '&deg;';
              currentContent += '<span class="label-hilo">&nbsp;&nbsp;&nbsp;Low: </span>' + Math.round(data.daily.data[0].temperatureMin) + '&deg;</p></div>';
              
              //
              // CONTENT FOR RIGHT DIV, DETAILS
              //         
              currentContent += '<div class="six columns weather-deets">';
              // currentContent += '<p><span class="label">Percipitation: </span>' + (Math.floor(data.daily.data[0].precipProbability * 100)) + '&#37;</p>';
                currentContent += '<p><span class="label">Wind:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>' + (Math.floor(data.currently.windSpeed * 100)) + '&nbsp;mph</p>';
                currentContent += '<p><span class="label">Humidity:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>' + (Math.floor(data.currently.humidity * 100)) + '&#37;</p>';
                currentContent += '<p><span class="label">Pressure:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>' + (Math.round(data.currently.pressure * 100)) + '&nbsp;mb</p></div>';
            $('#weather-header').html(weatherHeader);
            $('#weather-current').html(currentContent);
    });
}


  


 