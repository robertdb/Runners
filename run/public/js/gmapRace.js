// Global variables
var map;
var myLatLng;


// create map
function createMap() {

  var raceId = $('.detail-race').data('raceid');
  mylink = "http://localhost:8000/api/races/" + raceId ;

  $.get(mylink,

      function(val){

        myLatLng= new google.maps.LatLng(val.lat, val.lng);

        map = new google.maps.Map(document.getElementById('map-race'),
                                  {
                                    center: myLatLng,
                                    zoom: 8
                                  });

        var marker = new google.maps.Marker(
          {
            position: myLatLng,
            map: map
          }
        );
        /* content */
        var content;
        var image = "<img width=100% height=50px src="+val.img+">";
        var title = "<h6><b>"+val.title+"</b></h6>";
        var date = "<h6><b>Fecha</b>: "+val.date+"</h6>"
        var hour = "<h6><b>Hora</b>: "+val.hour+"</h6>"
        var distance = "<h6><b>Distancia</b>: "+val.distance+"</h6>"
        content = "<style>h6{font-family: inherit};</style><div><a style='text-decoration:none;color:#000000'href="+mylink+">"+title+date+hour+distance+"</a></div>";
        console.log(content);
        infoWindow = new google.maps.InfoWindow({
            content: content
        });

        google.maps.event.addListener(marker, 'click', (function(marker, infoWindow) {
            return function() {
                if(infoWindow) {
                    infoWindow.close();
                }
                infoWindow.open(map, marker);
            };
        })(marker, infoWindow));

      });

}


$(document).ready(function(){

  createMap();

  var raceId = $('.detail-race').data('raceid');
  console.log(a);
});
