"use strict";
var latlng;
var date;

function initMap() {
    // Set up basic map view
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        zoomControl: false,
        streetViewControl: false,
        center: {lat: 43.0500, lng: -87.9500},
        scrollwheel: false,
        mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.SATELLITE
       
    });
    // Keep Map Centered on resize
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
    var currentContent = "";
    var hourlyContent = "";
    var dailyContent = "";
    var data;

    $.getJSON(url + apiKey + "/" + lati + "," + longi + "?callback=?", function(data) {
              console.log(data);
              currentContent += '<div class="six columns">';
              currentContent += '<h1 class="weather-current">' + Math.round(data.currently.temperature) + '&deg;</h1></div>';
              currentContent += '<div class="six columns"><p> High: ' + data.daily.data[0].temperatureMax + '&deg;</p>';
              currentContent += '<p> Low: ' + data.daily.data[0].temperatureMin + '&deg;</p>';
              currentContent += '<p> Percipitation: ' + (Math.floor(data.daily.data[0].precipProbability * 100)) + '&#37;</p></div>';
            $('#weather-current').html(currentContent);
                


                // for (var i = 0; i < data.hourly.data.length; i++) {
                //     console.log(i);
                //     hourlyContent += '<h2>Temp: </h2>';
                //     hourlyContent += '<span>' + Math.round(data.hourly.data[i].temperature) + '</span>';
                //     hourlyContent += '<br/>';
                // };
            $('#weather-hourly').html(hourlyContent);

                // for (var i = 0; i < data.daily.data.length; i++) {
                //     console.log("test " + dailyContent);
                //      dailyContent += '<span>' + data.daily.data[i].icon + '</span>';
                // }
            $('#weather-outlook').html(dailyContent);
            

    });
}

function predictWeather(){
	var apiKey = '8951bee95458c4ab8a6121ec2452207a';
    var url = 'https://api.forecast.io/forecast/';
    var lati = latlng[0];
    var longi = latlng[1];
    var selectedDate = new Date(date);
    var time = selectedDate.getTime()/1000;
    var currentContent = "";
    var hourlyContent = "";
    var dailyContent = "";
    console.log(time);
    console.log('the date is: '+ selectedDate);
    var data;

    $.getJSON(url + apiKey + "/" + lati + "," + longi + "," + time + "?callback=?", function(data) {
              console.log(data);
              // return data;
              currentContent += '<div class="six columns">';
              currentContent += '<i class="wi wi-forecast-io-' + data.currently.icon + '"></i>'
              currentContent += ' <h1 class="weather-current">' + Math.round(data.currently.temperature) + '&deg;</h1></div>';

              currentContent += '<div class="six columns"><h5>' + selectedDate.toDateString() +'</h5>';
              
              currentContent += '<div>High: ' + data.daily.data[0].temperatureMax + '&deg;</div>';
              currentContent += '<div>Low: ' + data.daily.data[0].temperatureMin + '&deg;</div>';
              currentContent += '<div>Percipitation: ' + (Math.floor(data.daily.data[0].precipProbability * 100)) + '&#37;</div></div>';
            $('#weather-current').html(currentContent);
    });
}


  


 