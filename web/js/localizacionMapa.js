

  
  var marker;
  var map;
  var latlng;
  var mapResized = false;

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

    var latlngbounds = new google.maps.LatLngBounds();

    marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title: "Tu Inmueble",
      icon: '../img/pini.png',
    });

    $('#markets').val(coordGuardadas);

    google.maps.event.addListener(map, 'click', function(event) {
      placeMarker(event.latLng);
    });

    google.maps.event.addListener(map, 'bounds_changed', function() {
      var bounds = map.getBounds();
      resizeMap(map);

    });

  }

  function resizeMap(map) {
      google.maps.event.trigger(map, 'resize');
      mapResized = true;
  }
  
  function loadScript() {
    var script = document.createElement("script");
    //script.src = "http://maps.googleapis.com/maps/api/js?callback=initialize";
    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCY8CNW_RufWGUkW-DYyxbSnrIBKxHynaQ&libraries=visualization&callback=initialize";
    document.body.appendChild(script);
  }

 window.onload = loadScript;







 


