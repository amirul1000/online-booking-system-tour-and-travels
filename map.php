  
   <!--Google Map-->
    <!--<link
        href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css"
        rel="stylesheet" type="text/css" />-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcrswHj0tzu7lYsDwFyaxwe3I1zRLIDZQ&callback=initMap" async defer></script>
    <script type="text/javascript">
    //clear
     var markersArray = [];
     function clearOverlays() {
          for (var i = 0; i < markersArray.length; i++ ) {
            markersArray[i].setMap(null);
          }
        }
    //lat lng		
      var lat = '<?=$_REQUEST['lat']?>';
      var lng = '<?=$$_REQUEST['lng']?>';
      var geocoder;
      var map;
      function initialize() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;  
        
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(lat,lng);
        var myOptions = {
          zoom: 12,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
         //map.clearOverlays();	
         placeMarker(latlng);
         //codeAddress();
        google.maps.event.addListener(map, 'click', function(event) {							   
            placeMarker(event.latLng);
          });
         //calculateAndDisplayRoute(directionsService, directionsDisplay);
      }
    
      function codeAddress() {
        //clear
        clearOverlays();
        
        var address = "<?=$_REQUEST['destination']?>";
        geocoder.geocode( { 'address': address}, function(results, status) {
                   
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map, 
                position: results[0].geometry.location
            });
            //store
            markersArray.push(marker);
            
            lat = marker.position.lat();
            lng = marker.position.lng();
            
           
          } else {
            //alert("Geocode was not successful for the following reason: " + status);
          }
        });									
      }
      
      function placeMarker(location) {	
            //clear
            clearOverlays();
                                                                               
            lat = location.lat();        
            lng = location.lng();	
          var marker = new google.maps.Marker({
              position: location, 
              map: map
          });
        //store
         markersArray.push(marker);
        
          map.setCenter(location);
        }
        
        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            directionsService.route({
              origin: "<?=$_REQUEST['source']?>",
              destination: "<?=$_REQUEST['destination']?>",
              travelMode: 'DRIVING'
            }, function(response, status) {
              if (status === 'OK') {
                directionsDisplay.setDirections(response);
              } else {
                window.alert('Directions request failed due to ' + status);
              }
            });
          }
          
          /* setTimeout(function() {
                $("#product-pop-up").hide(); 
            }, 1000);  */ 
    </script>
    <div class="form-group">
        <body onLoad="initialize()">
            <div id="map_canvas" style="width:850px;height:480px; margin:10px 0px 10px 0px;" align="center"></div>
        </body>
        
    </div>
                                          