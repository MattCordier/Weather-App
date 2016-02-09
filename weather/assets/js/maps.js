"use strict";

var latlng = [];
var date; 

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success);

} else {
    alert("Enable location services.");
  error('Geo Location is not supported');
}


function success(position) {
    latlng = [];
    date = "";
    var  lat  = position.coords.latitude;
    var  lng =  position.coords.longitude;
    var  myLocation = new google.maps.LatLng(lat, lng);
    console.log("-----");
    console.log(position);
    console.log("-----");

    // Set up basic map view
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        zoomControl: false,
        streetViewControl: false,
        center: new google.maps.LatLng(myLocation.lat(),myLocation.lng()),
        scrollwheel: false,
        mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.SATELLITE
       
    });

/*
    var request = {
      location: {lat: myLocation.lat(),lng: myLocation.lng()},
      radius: 10
    };

    var service = new google.maps.places.PlacesService(map);
    console.log(service);

   service.getDetails({placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4'}, function(place, status){
      if (status === google.maps.places.PlacesServiceStatus.OK){
        console.log(place.place_id);
        $('#app-title').html(place.address_components[5].long_name);
      }
   });
*/


$.getJSON( "http://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lng, function( data ) {
  var mylocale = data.results[0];
  var cit = mylocale.address_components[3].long_name;
  var st = mylocale.address_components[5].long_name;
  var ctry = mylocale.address_components[6].long_name;
  $('#app-title').html(cit + ",   " + st + ",   " + '<span style="font-weight: 300"><i>' + ctry + '</i></span>');
});


    //Autocomplete address input
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
    // geocoder.geocode({'location': localLatLng}, function(results, status) {
    //     if (status === google.maps.GeocoderStatus.OK) {
    //         resultsMap.setCenter(results[0].geometry.location);
    //         latlng.push(results[0].geometry.location.lat());
    //         latlng.push(results[0].geometry.location.lng());

    //         if (results[0]) {

    //                   var address = "", city = "", state = "", country = "";
    //                   var lat;
    //                   var lng;

    //                   for (var i = 0; i < results[0].address_components.length; i++) {
    //                       var addr = results[0].address_components[i];
    //                       // check if this entry in address_components has a type of country
    //                       if (addr.types[0] == 'country')
    //                           country = addr.long_name;
    //                       else if (addr.types[0] == ['administrative_area_level_1'])       // State
    //                           state = addr.long_name + ", ";
    //                       else if (addr.types[0] == ['locality'])       // City
    //                           city = addr.long_name + ", ";
    //                   }
                      
    //                   $('#app-title').html(city + "   " + state + "   " + '<span style="font-weight: 300"><i>' + country + '</i></span>');

    //     } else {
    //        $('#alert').show().html('please enter a location');
    //        // 'Geocode was not successful for the following reason: ' + status
    //       }
    //     }  
    // });
    

    //run after user's location is determined
    latlng.push(map.center.lat());
    latlng.push(map.center.lng());


    // $('#app-title').html('Hey!');
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

function geocodeAddress(geocoder, resultsMap) {
    latlng = [];    
    date = document.getElementById('dp').value;
    var address = document.getElementById('address').value;
    $('#alert').hide();
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
                              state = addr.long_name;
                          else if (addr.types[0] == ['locality'])       // City
                              city = addr.long_name;
                      }
                      
                      $('#app-title').html(city + ",    " + state + ",    " + '<span style="font-weight: 300"><i>' + country + '</i></span>');

        } else {
           $('#alert').show().html('please enter a location');
           // 'Geocode was not successful for the following reason: ' + status
          }
        }  
        predictWeather();       
    });
}

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
              currentContent += '<i class="wi wi-forecast-io-' + data.currently.icon + ' wi-big" title="'+ data.currently.icon + '"></i>'
              currentContent += '<h1 class="weather-current">' + Math.round(data.currently.temperature) + '&deg;</h1>';
              currentContent += '<p class="p-hilo"><span class="label-hilo">High: </span>' + Math.round(data.daily.data[0].temperatureMax) + '&deg;';
              currentContent += '<span class="label-hilo">&nbsp;&nbsp;&nbsp;Low: </span>' + Math.round(data.daily.data[0].temperatureMin) + '&deg;</p>';
              currentContent += '<p class="p-hilo"><span class="label-hilo">Feels like ' + Math.round(data.currently.apparentTemperature) +'&deg;</span></p></div>';
              
              //
              // CONTENT FOR RIGHT DIV, DETAILS
              //         
              currentContent += '<div class="six columns weather-deets">';
              // currentContent += '<p><span class="label">Percipitation: </span>' + (Math.floor(data.daily.data[0].precipProbability * 100)) + '&#37;</p>';
                // currentContent += '<p class="weather-summary">' + data.currently.summary  + '&nbsp;&nbsp;|&nbsp;&nbsp;'; 
                currentContent += '<p><span class="label">Wind:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>' + (Math.round(data.currently.windSpeed)) + '&nbsp;mph</p>';
                currentContent += '<p><span class="label">Humidity:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>' + (Math.floor(data.currently.humidity * 100)) + '&#37;</p>';
                currentContent += '<p><span class="label">Pressure:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>' + (Math.round(data.currently.pressure * 100)) + '&nbsp;mb</p>';
                currentContent += '<div class="weather-deets-summary">';
                currentContent += '<p><span class="label">Summary:</span></p>'
                currentContent += '<p><span class="label-alert">' + data.hourly.summary + '</span></p></div>';
                if (data.alerts){
                  currentContent += '<p>' + data.alerts[0].title + '</p></div>';
                }
                currentContent += '</div>';
            $('#weather-header').html(weatherHeader);
            $('#weather-current').html(currentContent);
    });
}
