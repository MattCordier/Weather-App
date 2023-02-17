var app = angular.module( 'weatherApp', []); 


app.controller('CurrentWeatherCntrl', function($scope) {
  $scope.weather = {
    temp: "33"
  };
});
