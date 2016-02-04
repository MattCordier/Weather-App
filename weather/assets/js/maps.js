"use strict";
var latlng;
var date;

function initMap() {
    
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        zoomControl: false,
        streetViewControl: false,
        center: {lat: 43.0500, lng: -87.9500},
        scrollwheel: false,
        mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.SATELLITE
       
    });
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center); 
    });
    
    var geocoder = new google.maps.Geocoder();

    document.getElementById('submit').addEventListener('click', function() {
        geocodeAddress(geocoder, map);
    });

    $("#address").keypress(function(event) {
    if (event.which == 13) {
        event.preventDefault();
        geocodeAddress(geocoder, map);
    }
})
}

function geocodeAddress(geocoder, resultsMap) {
	latlng = [];	
    var address = document.getElementById('address').value;
    date = document.getElementById('datepicker').value;
	
    geocoder.geocode({'address': address}, function(results, status) {
	    if (status === google.maps.GeocoderStatus.OK) {
	        resultsMap.setCenter(results[0].geometry.location);
	       
	        latlng.push(results[0].geometry.location.lat());
	        latlng.push(results[0].geometry.location.lng());
	        
           
	      
	    } else {
	           alert('Geocode was not successful for the following reason: ' + status);
	      }

	    if (date === ""){	
			getWeather();  
		} else if (date !== ""){
			predictWeather();
		}
    });
}

function getWeather(){
	var apiKey = '8951bee95458c4ab8a6121ec2452207a';
    var url = 'https://api.forecast.io/forecast/';
    var lati = latlng[0];
    var longi = latlng[1];
    var hourlyContent;
    var data;

    $.getJSON(url + apiKey + "/" + lati + "," + longi + "?callback=?", function(data) {
              console.log(data);
              // return data;
            $('#weather-current').html(data.daily.data[0].ozone +'<h1>Current Temp: ' + Math.round(data.currently.temperature) + '&deg;</h1>');
                for (var i = 0; i < data.hourly.data.length; i++) {
                    hourlyContent += '<h2>Temp: </h2>';
                    hourlyContent += '<span>' + Math.round(data.hourly.data[i].temperature) + '</span>';
                    hourlyContent += '<br/>';
                };
            $('#weather-hourly').html(
                    hourlyContent

                );
            $('#weather-outlook').html(data.daily.data[0].ozone +'<h1>Current Temp: ' + data.currently.temperature + '&deg;</h1>');
            

    });
}

function predictWeather(){
	var apiKey = '8951bee95458c4ab8a6121ec2452207a';
    var url = 'https://api.forecast.io/forecast/';
    var lati = latlng[0];
    var longi = latlng[1];
    var selectedDate = new Date(date);
    var time = selectedDate.getTime()/1000;
    console.log(time);
    console.log('the date is: '+ selectedDate);
    var data;

    $.getJSON(url + apiKey + "/" + lati + "," + longi + "," + time + "?callback=?", function(data) {
              console.log(data);
              // return data;
            $('#weather-data').html(data.daily[0] +'<h1>Predicted: ' + data.currently.temperature + '&deg;</h1>');
    });
}


  


 