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
    return marker;
  }


  function searchMarathons(lat, lng) {

    $.get('http://localhost:8000/api/races',
          function(match){

            var content;

            var mylink;

            $.each(match, function(i,val){

              gLatLng= new google.maps.LatLng(val.lat, val.lng);

              gicn = {
                      url: "../img/start-marathon.png", // url
                      scaledSize: new google.maps.Size(35, 35), // scaled size
                      origin: new google.maps.Point(0,0), // origin
                      anchor: new google.maps.Point(0, 0) // anchor
                    };

              mylink = "http://localhost:8000/races/" + val.id;
              var image = "<img width=100% height=150px src="+val.img+">";
              var title = "<h5>"+val.title+"</h5>";
              var date = "<h6>"+val.date+"</h6>"
              content = "<style>h5{font-family: inherit};</style><div style='width:200px'><a style='text-decoration:none;color:#000000'href="+mylink+">"+image+title+date+"</a></div>";
              console.log(content);

              infoWindow = new google.maps.InfoWindow({
                  content: content
              });

              var marker = createMarker(gLatLng, gicn, val.title);


              google.maps.event.addListener(marker, 'click', (function(marker, infoWindow) {
                  return function() {
                      if(infoWindow) {
                          infoWindow.close();
                      }
                      infoWindow.open(map, marker);
                  };
              })(marker, infoWindow));

            });

          });
  }

});
