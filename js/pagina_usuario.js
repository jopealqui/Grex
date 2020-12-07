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

  function showPrice(e) {
    var div = document.getElementById('price');
    div.classList.add('edge--visible');
    div.classList.remove('edge');

    var div = document.getElementById('corrida');
    div.classList.add('edge--visible--flex');
    div.classList.remove('edge');

    var routeIdx = directionsManager.getRequestOptions().routeIndex;

    var d = Math.round(e.routeSummary[routeIdx].distance * 100) / 100;

    var price = Math.round((((d / 15) * 4.5) + (d * 2) * 100) / 100);

    document.getElementById("bPrice").innerHTML = '<h1>R$' + price + '</h1>';
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
  //Get the current route index.
  var routeIdx = directionsManager.getRequestOptions().routeIndex;

  //Get the distance of the route, rounded to 2 decimal places.
  var distance = Math.round(e.routeSummary[routeIdx].distance * 100) / 100;

  //Get the distance units used to calculate the route.
  var units = directionsManager.getRequestOptions().distanceUnit;
  var distanceUnits = '';

  if (units == Microsoft.Maps.Directions.DistanceUnit.km) {
    distanceUnits = 'km'
  } else {
    //Must be in miles
    distanceUnits = 'miles'
  }

  //Time is in seconds, convert to minutes and round off.
  var time = Math.round(e.routeSummary[routeIdx].timeWithTraffic / 60);
  //document.getElementById('routeInfoPanel').innerHTML = 'Distance: ' + distance + ' ' + distanceUnits + '<br/>Time with Traffic: ' + time + ' minutes';
}

function directionsError(e) {
  alert('Error: ' + e.message + '\r\nResponse Code: ' + e.responseCode)
}
