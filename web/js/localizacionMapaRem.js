
   
  /*var mapcanvas =document.createElement('div');
  mapcanvas.id = 'mapcanvas';
  mapcanvas.style.height = '300px';
  mapcanvas.style.width = '300px';
  mapcanvas.style.border = '1px solid black';
     
  document.querySelector('article').appendChild(mapcanvas);*/  

  
  var marker2;
  var map2;
  var latlng2;
  var mapResized2 = false;

  function placeMarker(location) {
    if ( marker2 ) {
      
      marker2.setPosition(location);
      var lat2 = marker2.getPosition().lat();
      var lng2 = marker2.getPosition().lng();
      var coorde = lat2 + ',' + lng2;
      $("#markets2").val(coorde);

    } else {
      marker2 = new google.maps.Marker({
        position: location,
        map: map2,
        title: "Tu Inmueble",
      });

      var lat2 = marker2.getPosition().lat();
      var lng2 = marker2.getPosition().lng();
      var coorde = lat2 + ',' + lng2;
      
      $('#markets2').val(coorde);

      
    }
  }

  function init() {
     if(coord){
       var arreglo2 = coord.split(',');
       latlng2 = new google.maps.LatLng(arreglo2[0], arreglo2[1]);

     }else{
       latlng2 = new google.maps.LatLng(-34.333230470355154, -56.69975280761719);
     }
    
    var myOptions = {
      zoom: 15,
      center: latlng2,
      mapTypeControl: false,
      navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map2 = new google.maps.Map(document.getElementById("map_remate"), myOptions);

    var latlngbounds2 = new google.maps.LatLngBounds();

    marker2 = new google.maps.Marker({
      position: latlng2,
      map: map2,
      title: "Tu Remate",
      icon: '../img/pinr.png',
    });


    $('#markets2').val(coord);

    google.maps.event.addListener(map2, 'click', function(event) {
      placeMarker(event.latLng);
    });

    google.maps.event.addListener(map2, 'bounds_changed', function() {
      var bounds2 = map2.getBounds();
      resizeMap2(map2);

    });

  }
  
  function resizeMap2(map2) {
      google.maps.event.trigger(map2, 'resize');
      mapResized2 = true;
  }
  
  function loadScript2() {
    var script2 = document.createElement("script");
    //script.src = "http://maps.googleapis.com/maps/api/js?callback=initialize";
    script2.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCY8CNW_RufWGUkW-DYyxbSnrIBKxHynaQ&libraries=visualization&callback=init";
    document.body.appendChild(script2);
  }


 window.onload = loadScript2;






 


