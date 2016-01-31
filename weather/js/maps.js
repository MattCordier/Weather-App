// var map;
//       function initMap() {
//         map = new google.maps.Map(document.getElementById('map'), {
//           center: {lat: 43.0500, lng: -87.950},
//           zoom: 8
//         });
//       }


 var geocoder;
var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlang = new google.maps.LatLng(42, -84);
    var myOptions = {
        center: latlang, zoom: 5, mapTypeId: google.maps.MapTypeId.SATELLITE,
        navigationControlOptions: {
            style: google.maps.NavigationControlStyle.SMALL
        }
    };
    map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
  }

  function codeAddress() { 
    var sAddress = document.getElementById("newLocation").value;
    geocoder.geocode( { 'address': sAddress}, function(results, status) { 
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
                });
            }
            else{
            alert("Geocode was not successful for the following reason: " + status);
            }
        });
  }     