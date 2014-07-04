// Variables globales

    var map, geocoder;
    // Instancia del geocodificador
    geocoder = new google.maps.Geocoder();
 window.onload = function() {
    // cargamos opciones de mapa    
        var options = {
            zoom: 14,
            center: new google.maps.LatLng(19.233334, -103.733330),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    // Instancia del mapa
        map = new google.maps.Map(document.getElementById('mapa'), options);
    // Relación del evento de clic en el botón con el 
    // procedimiento de georreferenciación
     document.getElementById('colonia').onchange = function(){
     	// Obtiene la ubicación (string) a georreferenciar
        var estado = $("#estado option:selected").html();
 		var municipio = $("#municipio option:selected").html();
 		var colonia = $("#colonia option:selected").html();
 		var localizacion = estado+', '+municipio+', Colonia '+colonia;
 		// Inicia el proceso de georreferenciación (asíncrono)
        processGeocoding(localizacion, addMarkers);
        // Detiene el procesamiento del evento
            return false;
     }
 }

 function processGeocoding(location, callback){
        // Propiedades de la georreferenciación
        var request = {
            address: location
        }
        // Invocación a la georreferenciación (proceso asíncrono)
        geocoder.geocode(request, function(results, status) {
            
            /*
             * OK
             * ZERO_RESULTS
             * OVER_QUERY_LIMIT
             * REQUEST_DENIED
             * INVALID_REQUEST 
             */
            // Notifica al usuario el resultado obtenido
            //document.getElementById('message').innerHTML = "Respuesta obtenida: " + status;
            // En caso de terminarse exitosamente el proyecto ...
            if(status == google.maps.GeocoderStatus.OK)
            {
                // Invoca la función de callback              
                callback (results);
                // Retorna los resultados obtenidos
                return results;
            }
               // En caso de error retorna el estado 
            return status;
        });
    }


 function addMarkers(geocodes){
        for(i=0; i<geocodes.length; i++)
        {
            // Centra el mapa en la nueva ubicación            
            map.setCenter(geocodes[i].geometry.location);
            // Valores iniciales del marcador
            var marker = new google.maps.Marker({
                map: map,
                title: geocodes[i].formatted_address
            });           
            // Establece la ubicación del marcador
            marker.setPosition(geocodes[i].geometry.location);          
            // Establece el contenido de la ventana de información        
            var infoWindow = new google.maps.InfoWindow();
            content = "Ubicación: " + geocodes[i].formatted_address + "<br />" +
                             "Tipo: " + geocodes[i].types + "<br />" +
                             "Latitud: " + geocodes[i].geometry.location.lat() + "<br />" +
                             "Longitud: " + geocodes[i].geometry.location.lng();
            
            infoWindow.setContent(content);
            // Asocia el evento de clic sobre el marcador con el despliegue
            // de la ventana de información
            google.maps.event.addListener(marker, 'click', function(event) {
                infoWindow.open(map, marker);
            });
          // infowindow.open(map, marker);
        }
}