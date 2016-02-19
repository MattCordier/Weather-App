"use strict";
var latlng = [];

/*/////

Check to see if browser supports geoloction.
if yes but not enabled, use Default.
if no, use secondary Default.
/////*/

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(userLocal, defaultLocal);
       
} else {
    alert("Browser does not support geolocation.");
    //secondary default location
    var lat = 43.0500;
    var lng = -87.9500;
    mapHandler(lat, lng);
}

function userLocal(position) {
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  mapHandler(lat, lng);
}

function defaultLocal() {
    var lat = 43.0500;
    var lng = -87.9500;
    mapHandler(lat, lng);
}

function mapHandler(lat, lng) {
    latlng = [];

    // Set up basic map view, use LatLng class to set center
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        zoomControl: false,
        streetViewControl: false,
        center: new google.maps.LatLng(lat,lng),
        scrollwheel: false,
        mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.SATELLITE
       
    });

    //Get initial name of user's location and display as heading 
    showUserLocal(lat, lng);
    
    //Autocomplete address input(USES GOOGLE "places" LIBRARY)
    var input = (document.getElementById('address'));
    var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

    // Keep Map centered on window resize
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center); 
    });
    
    var geocoder = new google.maps.Geocoder();
    
    //run after user's location is determined
    latlng.push(map.center.lat());
    latlng.push(map.center.lng());

    predictWeather();

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
    });

}

/*/////

Use Google's Geocoding to fetch name of user's actual location 

/////*/
function showUserLocal(lat, lng){
  $.getJSON( "http://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lng, function( data ) {
      var mylocale = data.results[0];
      var cit = mylocale.address_components[3].long_name;
      var st = mylocale.address_components[5].long_name;
      var ctry = mylocale.address_components[6].long_name;
      $('#app-title').html(cit + ",   " + st + ",   " + '<span style="font-weight: 300"><i>' + ctry + '</i></span>');
    console.log($("#app-title").text());
    });
}

function geocodeAddress(geocoder, resultsMap) {
    latlng = [];    
    
    var address = document.getElementById('address').value;
    console.log(address);  
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        resultsMap.setCenter(results[0].geometry.location);
        latlng.push(results[0].geometry.location.lat());
        latlng.push(results[0].geometry.location.lng());

        if (results[0]) {
          var address = "", city = "", state = "", country = "";
          var lat;
          var lng;

          for (var i = 0; i < results[0].address_components.length; i++) {
            var addr = results[0].address_components[i];
            // check if this entry in address_components has a type of country
            if (addr.types[0] == 'country')
              country = addr.long_name;
            else if (addr.types[0] == ['administrative_area_level_1'])       // State
              state = addr.long_name + ", ";
            else if (addr.types[0] == ['locality'])       // City
              city = addr.long_name + ", ";
          }
          
          $('#app-title').html(city + "  " + state + "  " + '<span style="font-weight: 300"><i>' + country + '</i></span>');

        } else {
          $('#alert').show().html('please enter a location');
        // 'Geocode was not successful for the following reason: ' + status
        }
      }  
      predictWeather();       
    });
}

/*
CALL TO FORECAST.IO API, FORMAT AND POPULATE PAGE WITH DATA FROM API
*/

function predictWeather() {
    var apiKey = '8951bee95458c4ab8a6121ec2452207a';
    var url = 'https://api.forecast.io/forecast/';
    var lati = latlng[0];
    var longi = latlng[1];
    var date = document.getElementById('dp').value;
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

    console.log(selectedDate);
    console.log(time);

    $.getJSON(url + apiKey + "/" + lati + "," + longi + "," + time + "?callback=?", function(data) {
      console.log(data);
      weatherHeader += '<div class="twelve columns weather-header-col"><p class="p-date">' + selectedDate.toDateString() +'</p></div>';
      // 
      // CONTENT FOR LEFT DIV, OVERVIEW
      // 
      currentContent += '<div class="six columns">';
      currentContent += '<i id="wi-current" class="wi wi-forecast-io-' + data.currently.icon + ' wi-big" title="'+ data.currently.icon + '"></i>'
      currentContent += '<h1  class="weather-current"><span id="current">' + Math.round(data.currently.temperature) + '&deg;</span></h1>';
      currentContent += '<p class="p-hilo"><span class="label-hilo">High: </span><span id="hi-temp">' + Math.round(data.daily.data[0].temperatureMax) + '&deg;</span></p>';
      currentContent += '<p class="p-hilo"><span class="label-hilo">Low: </span><span id="lo-temp">' + Math.round(data.daily.data[0].temperatureMin) + '&deg;</span></p>';
      currentContent += '<p class="p-hilo"><span class="label-hilo">Feels like: </span><span id="feel">' + Math.round(data.currently.apparentTemperature) +'&deg;</span></p></div>';
      
      //
      // CONTENT FOR RIGHT DIV, DETAILS
      //         
      currentContent += '<div class="six columns weather-deets">';
      currentContent += '<p><span class="label">Wind:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span id="wind">' + (Math.round(data.currently.windSpeed)) + '&nbsp;mph</span></p>';
      currentContent += '<p><span class="label">Humidity:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span id="humid">' + (Math.floor(data.currently.humidity * 100)) + '&#37;</span></p>';
      currentContent += '<div class="weather-deets-summary">';
      currentContent += '<p><span class="label">Next Hour:</span></p>'
        if (data.minutely){
          currentContent += '<p id="next-hour">' + data.minutely.summary + '</p></div>';
        } else {
          currentContent += '<p id="next-hour">' + data.currently.summary + '</p></div>';
        }  
        if (data.alerts){
          currentContent += '<div class="weather-deets-summary">';
          currentContent += '<p><span id="weather-alert" class="label label-alert"><i class="material-icons">warning</i>' + data.alerts[0].title + '</span></p></div>';
        } else {
          currentContent += '<div class="weather-deets-summary">';
          currentContent += '<p><span class="label">Next 24 Hours:</span></p>'
          currentContent += '<p id="summary">' + data.daily.data[0].summary + '</p></div>';
        }
      currentContent += '</div>';
      $('#weather-header').html(weatherHeader);
      $('#weather-current').html(currentContent);
    });
}
