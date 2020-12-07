var map;
var directionsManager;

function GetMap() {
  map = new Microsoft.Maps.Map('#myMap', {});

  var enderec = '';

  function getText() {
    enderec = document.getElementById("endereco").value;
    return enderec;
  }
  /*
              Microsoft.Maps.Events.addHandler(directionsManager, 'directionsUpdated', function () {
                      window.setTimeout(function () {
                          directionsManager.clearAll();
                          document.getElementById('printoutPanel').innerHTML = 'Directions cleared (Waypoints cleared, map/itinerary cleared, request and render options reset to default values)';
                      }, 3000);
                  });
  */

  function showPrice() {
    var div = document.getElementById('price');
    div.classList.add('edge--visible');
    div.classList.remove('edge');
  }

  document.getElementById("botao").addEventListener("click", function() {
      navigator.geolocation.getCurrentPosition(function(position) {
      var loc = new Microsoft.Maps.Location(
        position.coords.latitude,
        position.coords.longitude);

      Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function() {
        directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);

        var seattleWaypoint = new Microsoft.Maps.Directions.Waypoint({
          location: loc
        });
        directionsManager.addWaypoint(seattleWaypoint);

        var workWaypoint = new Microsoft.Maps.Directions.Waypoint({
          address: getText()
        });
        directionsManager.addWaypoint(workWaypoint);

        Microsoft.Maps.Events.addHandler(directionsManager, 'directionsError', directionsError);
        Microsoft.Maps.Events.addHandler(directionsManager, 'directionsUpdated', directionsUpdated);
        Microsoft.Maps.Events.addHandler(directionsManager, 'directionsUpdated', showPrice);

        directionsManager.calculateDirections();
      });
    });
  });
}

function directionsUpdated(e) {
  var routeIdx = directionsManager.getRequestOptions().routeIndex;

  var distance = Math.round(e.routeSummary[routeIdx].distance * 100) / 100;

  var units = directionsManager.getRequestOptions().distanceUnit;
  var distanceUnits = '';

  if (units == Microsoft.Maps.Directions.DistanceUnit.km) {
    distanceUnits = 'km'
  } else {
    distanceUnits = 'miles'
  }
  var time = Math.round(e.routeSummary[routeIdx].timeWithTraffic / 60);
}

function directionsError(e) {
  alert('Error: ' + e.message + '\r\nResponse Code: ' + e.responseCode)
}
