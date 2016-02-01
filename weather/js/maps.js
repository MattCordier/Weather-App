// var map;
//       function initMap() {
//         map = new google.maps.Map(document.getElementById('map'), {
//           center: {lat: 43.0500, lng: -87.950},
//           zoom: 8
//         });
//       }
"use strict";
var latlng = [];
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: {lat: -34.397, lng: 150.644}
  });
  var geocoder = new google.maps.Geocoder();

  document.getElementById('submit').addEventListener('click', function() {
    geocodeAddress(geocoder, map);
  });
}

function geocodeAddress(geocoder, resultsMap) {
	latlng = [];	
  var address = document.getElementById('address').value;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      resultsMap.setCenter(results[0].geometry.location);
      latlng.push(results[0].geometry.location.lat()); 
      latlng.push(results[0].geometry.location.lng());
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location
      });
      getLatLng();
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

function getLatLng(){
	console.log(latlng[0]);
	console.log(latlng[1]);

}





// $("#search").on("keyup", codeAddress());
//   function codeAddress() { 
//     var sAddress = $("#search").val();
//     console.log(sAddress);
//     geocoder.geocode( { 'address': sAddress}, function(results, status) { 
//             if (status == google.maps.GeocoderStatus.OK) {
//                 map.setCenter(results[0].geometry.location);
//                 var marker = new google.maps.Marker({
//                 map: map,
//                 position: results[0].geometry.location
//                 });
//             }
//             else{
//             alert("Geocode was not successful for the following reason: " + status);
//             }
//         });
//   }     