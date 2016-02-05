"use strict";

var latlng = [];
var date; 

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} else {
    alert('It seems like Geolocation, which is required for this page, is not enabled in your browser. Please use a browser which supports it.');
}

function successFunction(position) {
    latlng[0] = position.coords.latitude;
    latlng[1] = position.coords.longitude;
    console.log('Your latitude is :'+latlng[0]+' and longitude is '+latlng[1]);
}


