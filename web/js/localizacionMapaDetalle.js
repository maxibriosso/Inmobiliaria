  var marker4;
  var map4;
  var latlng4;
  var coord;
  var mapResized4 = false;

  function init() {

  var coord_inm = $( '#map_detalle' ).data( 'coord');

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

    separador = ";";
    limite    = 2;
    cadena = coord_inm.split(separador, limite);
    var lat = cadena[0];
    var log = cadena[1];
    console.log(lat);
    console.log(log);

    latlng4 = new google.maps.LatLng(lat,log);  
    
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

    map4 = new google.maps.Map(document.getElementById("map_detalle"), myOptions);

    marker4 = new google.maps.Marker({
      position: latlng4,
      map: map4,
      icon: '../img/pinc3.png',
    });

    $('#markets4').val(coord);
  }
  
  function resizeMap4(map4) {
      google.maps.event.trigger(map4, 'resize');
      mapResized4 = true;
  }
  
  function loadScript4() {
    var script4 = document.createElement("script");
    script4.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCY8CNW_RufWGUkW-DYyxbSnrIBKxHynaQ&libraries=visualization&callback=init";
    document.body.appendChild(script4);
  }


 window.onload = loadScript4;






 


