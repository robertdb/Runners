/*$(document).ready(function(){

  var myLatLng = new google.maps.LatLng(-34.603722,-58.381592);

  var map = new google.maps.Map(document.getElementById('map'), {
         center: myLatLng,
         zoom: 10
       });

  function createMarker(myLatLng,icn,name) {

   var marker = new google.maps.Marker(
     {
       position: myLatLng,
       map: map,
       icon:icn,
       title: name
     });
  }


  var request = {
    location: myLatLng ,
    radius: '2000',
    types:['store']
  };

  service = new google.maps.places.PlacesService(map);

  service.nearbySearch(request, callback);


  function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      for (var i = 0; i < results.length; i++) {
        var place = results[i];
        myLatLng = place.geometry.location;
        icn = {
            url: "../img/start-marathon.png", // url
            scaledSize: new google.maps.Size(50, 50), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
        };
        name = place.name;
        createMarker(myLatLng, icn, name);
      }
    }
  }


});
*/


// Global variables
var map;
var myLatLng;

$(document).ready(function(){

  geoLocationInit();

  function geoLocationInit() {

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(success,fail);
    }
    else {
      alert("browser not supported");
    }
  }
  function success(position) {

    var latval = position.coords.latitude;

    var lngval = position.coords.longitude;

    console.log([latval, lngval]);

    myLatLng = new google.maps.LatLng(latval, lngval);

    createMap(myLatLng);

    //nearbySearch(myLatLng,'hotel');

    searchMarathons(latval,lngval);

  }

  function fail() {

    alert("it fails");

  }

  // create map
  function createMap(myLatLng) {

    map = new google.maps.Map(document.getElementById('map'),
                              {
                                center: myLatLng,
                                zoom: 12
                              });

    var marker = new google.maps.Marker(
      {
        position: myLatLng,
        map: map
      }
    );

  }

  function createMarker(myLatLng, icn, name) {

    var marker = new google.maps.Marker(
        {
          position: myLatLng,
          map: map,
          icon:icn,
          title: name
        });

  }

  // nearbyserach
  /*function nearbySearch(myLatLng, type) {

    var request = {
                    location: myLatLng ,
                    radius: '2000',
                    types:[type]
                  };

    service = new google.maps.places.PlacesService(map);

    service.nearbySearch(request, callback);

    function callback(results, status) {

      if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
          var place = results[i];
          myLatLng = place.geometry.location;
          icn = {
                  url: "../img/start-marathon.png", // url
                  scaledSize: new google.maps.Size(50, 50), // scaled size
                  origin: new google.maps.Point(0,0), // origin
                  anchor: new google.maps.Point(0, 0) // anchor
                };

          name = place.name;

          createMarker(myLatLng, icn, name);

        }
      }
    }
  }*/

  function searchMarathons(lat, lng) {

    $.get('http://localhost:8000/api/races',
          function(match){

            $.each(match, function(i,val){

              gLatLng= new google.maps.LatLng(val.lat, val.lng);

              gicn = {
                      url: "../img/start-marathon.png", // url
                      scaledSize: new google.maps.Size(35, 35), // scaled size
                      origin: new google.maps.Point(0,0), // origin
                      anchor: new google.maps.Point(0, 0) // anchor
                    };

                createMarker(gLatLng, gicn, val.title);

            });

          });
  }

});
