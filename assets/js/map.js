function initialize() {
  /*
    
    var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(latitude,longitude)
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
      
      
      
     */
    
    
  var myLatlng = new google.maps.LatLng(latitude,longitude);
  var mapOptions = {
    zoom: 4,
    center: myLatlng,
   panControl: false,
  zoomControl: false,
  mapTypeControl: false,
  scaleControl: false,
  streetViewControl: false,
  overviewMapControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  }); 
      
      
}

function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp' +
      '&signed_in=true&callback=initialize';
  document.body.appendChild(script);
}

//window.onload = loadScript;