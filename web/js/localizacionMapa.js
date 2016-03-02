
   
  /*var mapcanvas =document.createElement('div');
  mapcanvas.id = 'mapcanvas';
  mapcanvas.style.height = '300px';
  mapcanvas.style.width = '300px';
  mapcanvas.style.border = '1px solid black';
     
  document.querySelector('article').appendChild(mapcanvas);*/  

  
  var marker;
  var map;
  var latlng;

  function placeMarker(location) {
    if ( marker ) {
      
      marker.setPosition(location);
      var lat = marker.getPosition().lat();
      var lng = marker.getPosition().lng();
      var coord = lat + ',' + lng;
      $("#markets").val(coord);

    } else {
      marker = new google.maps.Marker({
        position: location,
        map: map,
        title: "Tu Inmueble",
      });
      var lat = marker.getPosition().lat();
      var lng = marker.getPosition().lng();
      var coord = lat + ',' + lng;
      $('#markets').val(coord);

      
    }
  }

  function initialize() {
    if(coordGuardadas){
       var arreglo = coordGuardadas.split(',');
       latlng = new google.maps.LatLng(arreglo[0], arreglo[1]);

     }else{
       latlng = new google.maps.LatLng(-34.333230470355154, -56.69975280761719);
     }

    
    var myOptions = {
      zoom: 15,
      center: latlng,
      mapTypeControl: false,
      navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title: "Tu Inmueble",
    });
    $('#markets').val(coordGuardadas);

    google.maps.event.addListener(map, 'click', function(event) {
      placeMarker(event.latLng);
    });

  }

  function loadScript() {
  var script = document.createElement("script");
  script.src = "http://maps.googleapis.com/maps/api/js?callback=initialize";
  document.body.appendChild(script);
}

 window.onload = loadScript;
 
   
  




 


