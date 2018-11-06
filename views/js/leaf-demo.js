// See post: http://asmaloney.com/2014/01/code/creating-an-interactive-map-with-leaflet-and-openstreetmap/

//http://186.101.52.123/ecSystem/get_datos_puntos1

var map = L.map( 'map', {
  center: [-1.802684, -79.536292],
  minZoom: 2,
  zoom: 10
})
//-1.802684, -79.536292

L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  subdomains: ['a', 'b', 'c']
}).addTo( map )

var myURL = jQuery( 'script[src$="leaf-demo.js"]' ).attr( 'src' ).replace( 'leaf-demo.js', '' )

var myIcon = L.icon({
  iconUrl: 'views/images/pin24.png',
  iconRetinaUrl: 'views/images/pin48.png',
  iconSize: [29, 24],
  iconAnchor: [9, 21],
  popupAnchor: [0, -14]
})

             $.ajax({
                    dataType: "json",
                    url:   'http://186.101.52.123/ecSystem/get_datos_puntos1', //archivo que recibe la peticion
                    success:  function (markers) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                      for ( var i=0; i < markers.length; ++i )
                      {
                       L.marker( [markers[i].lat, markers[i].lng], {icon: myIcon} )
                        .bindPopup( markers[i].name )
                        .addTo( map );
                      }
                    }
            });


// for ( var i=0; i < markers.length; ++i )
// {
//  L.marker( [markers[i].lat, markers[i].lng], {icon: myIcon} )
//   .bindPopup( markers[i].name )
//   .addTo( map );
// }
