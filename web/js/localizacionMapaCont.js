
   
  /*var mapcanvas =document.createElement('div');
  mapcanvas.id = 'mapcanvas';
  mapcanvas.style.height = '300px';
  mapcanvas.style.width = '300px';
  mapcanvas.style.border = '1px solid black';
     
  document.querySelector('article').appendChild(mapcanvas);*/  

  
  var marker4;
  var map4;
  var latlng4;
  var coord;
  var mapResized4 = false;

 
/*  marker3 = new google.maps.Marker({
    position: location,
    map: map2,
    title: "Tu Inmueble",
  });

  var lat2 = marker3.getPosition().lat();
  var lng2 = marker3.getPosition().lng();
  var coorde = lat2 + ',' + lng2;
  
  $('#markets3').val(coorde);*/


  function init() {

var styles = [
  {
    "featureType": "landscape",
    "stylers": [
      {
        "hue": "#0098FF"
      },
      {
        "saturation": -89.79591836734694
      },
      {
        "lightness": -32.86274509803921
      },
      {
        "gamma": 1
      }
    ]
  },
  {
    "featureType": "road.highway",
    "stylers": [
      {
        "hue": "#00FF49"
      },
      {
        "saturation": 35.60000000000002
      },
      {
        "lightness": -22.400000000000006
      },
      {
        "gamma": 1
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "stylers": [
      {
        "hue": "#00FF53"
      },
      {
        "saturation": 50.32679738562095
      },
      {
        "lightness": -8.800000000000011
      },
      {
        "gamma": 1
      }
    ]
  },
  {
    "featureType": "road.local",
    "stylers": [
      {
        "hue": "#00FF27"
      },
      {
        "saturation": 43.599999999999994
      },
      {
        "lightness": -23
      },
      {
        "gamma": 1
      }
    ]
  },
  {
    "featureType": "water",
    "stylers": [
      {
        "hue": "#0078FF"
      },
      {
        "saturation": 0
      },
      {
        "lightness": 23.200000000000003
      },
      {
        "gamma": 1
      }
    ]
  },
  {
    "featureType": "poi",
    "stylers": [
      {
        "hue": "#97FF00"
      },
      {
        "saturation": -95.16908212560385
      },
      {
        "lightness": -42.39999999999999
      },
      {
        "gamma": 1
      }
    ]
  }
];

    latlng4 = new google.maps.LatLng(-34.336005, -56.711476);
    
    
    var myOptions = {
      zoom: 15,
      center: latlng4,
      mapTypeControl: false,
      scrollwheel: false, 
      draggable: false,
      navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: styles
    };


/*    var marker4 = new google.maps.Marker({
      position: latlng4,
      map: map2,
      title: 'Peraza-Gonzalez'
    });*/

    map4 = new google.maps.Map(document.getElementById("map_contacto"), myOptions);

/*    var latlngbounds2 = new google.maps.LatLngBounds();*/

    marker4 = new google.maps.Marker({
      position: latlng4,
      map: map4,
      title: "Peraza-Gonzalez",
      animation:1,
      icon: '../img/pinc3.png',
    });


    $('#markets4').val(coord);
/*
    google.maps.event.addListener(map2, 'click', function(event) {
      placeMarker(event.latLng);
    });

    google.maps.event.addListener(map2, 'bounds_changed', function() {
      var bounds2 = map2.getBounds();
      resizeMap2(map2);

    });*/

  }
  
  function resizeMap4(map4) {
      google.maps.event.trigger(map4, 'resize');
      mapResized4 = true;
  }
  
  function loadScript4() {
    var script4 = document.createElement("script");
    //script.src = "http://maps.googleapis.com/maps/api/js?callback=initialize";
    script4.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCY8CNW_RufWGUkW-DYyxbSnrIBKxHynaQ&libraries=visualization&callback=init";
    document.body.appendChild(script4);
  }


 window.onload = loadScript4;






 


