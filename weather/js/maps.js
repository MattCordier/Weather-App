var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 42, lng: -84},
          zoom: 8
        });
      }
      