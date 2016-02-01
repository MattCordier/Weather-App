"use strict";
var latlng;
var date;
var mapStylesArray = [
    {
        "featureType": "all",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry",
        "stylers": [
            {
                "weight": 0.9
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#aecfb0"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#d6d6d6"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "lightness": "78"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#9a9a9a"
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": "-21"
            },
            {
                "color": "#a6a6a6"
            }
        ]
    }
];

function initMap() {
  var customMapType = new google.maps.StyledMapType(mapStylesArray,{name: 'Custom Style'});
  var customMapTypeId = 'custom_style';
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 2,
    zoomControl: false,
    center: {lat: 43, lng: -20},
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

// function getWeather(){
// 	var apiKey = '8951bee95458c4ab8a6121ec2452207a';
//     var url = 'https://api.forecast.io/forecast/';
//     var lati = latlng[0];
//     var longi = latlng[1];
//     var data;

//     $.getJSON(url + apiKey + "/" + lati + "," + longi + "?callback=?", function(data) {
//               console.log(data);
//             $('#weather').html(data.daily.icon +'<h1>Current Temp: ' + data.currently.temperature + '&deg;</h1>');
//         });

// }

// function predictWeather(){
// 	var apiKey = '8951bee95458c4ab8a6121ec2452207a';
//     var url = 'https://api.forecast.io/forecast/';
//     var lati = latlng[0];
//     var longi = latlng[1];
//     var selectedDate = new Date(date);
//     var time = selectedDate.getTime()/1000;
//     console.log(time);
//     console.log('the date is: '+ selectedDate);
//     var data;

//     $.getJSON(url + apiKey + "/" + lati + "," + longi + "," + time + "?callback=?", function(data) {
//               console.log(data);
//             $('#weather').html(data.daily.icon +'<h1>Predicted: ' + data.currently.temperature + '&deg;</h1>');
//         });
// }


 $(function() {
    $( "#datepicker" ).datepicker();
  });  


 