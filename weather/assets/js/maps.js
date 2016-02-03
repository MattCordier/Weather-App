"use strict";
var latlng;
var date;


function initMap() {

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 2,
        streetViewControl: false,
        center: {lat: 43, lng: -20},
        scrollwheel: false,
        mapTypeControl: false,
        mapTypeControlOptions: {
    	   mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
	    }
    });
    map.mapTypes.set(customMapTypeId, customMapType);
    map.setMapTypeId(customMapTypeId)
    var geocoder = new google.maps.Geocoder();

    document.getElementById('submit').addEventListener('click', function() {
        geocodeAddress(geocoder, map);
    });
}

function geocodeAddress(geocoder, resultsMap) {
	latlng = [];	
    var address = document.getElementById('address').value;
    date = document.getElementById('datepicker').value;
	
    geocoder.geocode({'address': address}, function(results, status) {
	    if (status === google.maps.GeocoderStatus.OK) {
	        resultsMap.setCenter(results[0].geometry.location);
	        resultsMap.setZoom(12);
	        latlng.push(results[0].geometry.location.lat());
	        latlng.push(results[0].geometry.location.lng());
	        
            var marker = new google.maps.Marker({
	           map: resultsMap, 
	           position: results[0].geometry.location
	        });
	      
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
    var data;

    $.getJSON(url + apiKey + "/" + lati + "," + longi + "?callback=?", function(data) {
              console.log(data);
              // return data;
            $('#weather').html(data.daily.icon +'<h1>Current Temp: ' + data.currently.temperature + '&deg;</h1>');
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
            $('#weather').html(data.daily.icon +'<h1>Predicted: ' + data.currently.temperature + '&deg;</h1>');
    });
}


  


 