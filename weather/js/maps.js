// var map;
//       function initMap() {
//         map = new google.maps.Map(document.getElementById('map'), {
//           center: {lat: 43.0500, lng: -87.950},
//           zoom: 8
//         });
//       }

var geocoder;
var map;
  function initMap() {
    geocoder = new google.maps.Geocoder();
    var latlang = new google.maps.LatLng(43.0500, -87.950);
    var myOptions = {
        center: latlang, zoom: 5, navigationControlOptions: {
            style: google.maps.NavigationControlStyle.SMALL
        }
    };
    map = new google.maps.Map(document.getElementById("map"),
        myOptions);
  }
console.log(geocoder);

$("#search").on("keyup", codeAddress());
  function codeAddress() { 
    var sAddress = $("#search").val();
    console.log(sAddress);
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