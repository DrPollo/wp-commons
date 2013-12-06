
(function($){
	
	/**
	 * Google API v3
	 */
	function wpgeo_init_admin_post_map() {
		
		$(document).ready(function($) {
			
			// Define map
			map = new google.maps.Map(document.getElementById("wpgeo_map_admin_post_1"), {
				zoom           : 15,
				center         : new google.maps.LatLng(45.073156924348, 7.6993560791016),
				mapTypeId      : google.maps.MapTypeId.ROADMAP,
				zoomControl    : true,
				mapTypeControl : true
			});
			
			// Define marker
			marker = new google.maps.Marker({
				position  : new google.maps.LatLng(45.073156924348, 7.6993560791016),
				map       : map,
				draggable : true
			});
			
			// Update marker location
			$("#wpgeo_location").bind("WPGeo_updateMarkerLatLng", function(e) {
				marker.setPosition(e.latLng);
				marker.setVisible(true);
			});
			
			// Update location field
			$("#wpgeo_location").bind("WPGeo_updateLatLngField", function(e) {
				if ( e.lat == '' || e.lng == '' ) {
					marker.setVisible(false);
				} else {
					var latLng = new google.maps.LatLng(e.lat, e.lng);
					map.setCenter(latLng);
					marker.setPosition(latLng);
					marker.setVisible(true);
					$("#wpgeo_location").trigger({
						type   : 'WPGeo_updateMapCenter',
						latLng : latLng,
						lat    : latLng.lat(),
						lng    : latLng.lng()
					});
				}
			});
			
			// Click on map
			google.maps.event.addListener(map, "click", function(e) {
				$("#wpgeo_location").trigger({
					type   : 'WPGeo_updateMarkerLatLng',
					latLng : e.latLng,
					lat    : e.latLng.lat(),
					lng    : e.latLng.lng()
				});
				$('input[name="_wp_geo_latitude"]').val(e.latLng.lat());
				$('input[name="_wp_geo_longitude"]').val(e.latLng.lng());
			});
			
			// Update map type
			google.maps.event.addListener(map, "maptypeid_changed", function() {
				var type = map.getMapTypeId();
				switch (type) {
					case "terrain":
						type = "G_PHYSICAL_MAP";
						break;
					case "roadmap":
						type = "G_NORMAL_MAP";
						break;
					case "satellite":
						type = "G_SATELLITE_MAP";
						break;
					case "hybrid":
						type = "G_HYBRID_MAP";
						break;
				}
				$("#wpgeo_location").trigger({
					type    : "WPGeo_updateMapType",
					mapType : type
				});
			});
			
			// Update zoom
			google.maps.event.addListener(map, "zoom_changed", function() {
				$("#wpgeo_location").trigger({
					type : "WPGeo_updateMapZoom",
					zoom : map.getZoom()
				});
			});
			
			// Update center
			google.maps.event.addListener(map, "dragend", function() {
				$("#wpgeo_location").trigger({
					type   : 'WPGeo_updateMapCenter',
					latLng : map.getCenter(),
					lat    : map.getCenter().lat(),
					lng    : map.getCenter().lng(),
				});
			});
			
			// Update marker location after drag
			google.maps.event.addListener(marker, "dragend", function(event) {
				$("#wpgeo_location").trigger({
					type   : 'WPGeo_updateMarkerLatLng',
					latLng : marker.getPosition(),
					lat    : marker.getPosition().lat(),
					lng    : marker.getPosition().lng(),
				});
				$('input[name="_wp_geo_latitude"]').val(marker.getPosition().lat());
				$('input[name="_wp_geo_longitude"]').val(marker.getPosition().lng());
			});
			
			// Hide marker?
			$("#wpgeo_location").bind("WPGeo_hideMarker", function(e){
				marker.setVisible(false);
			});
			
			// Move to center marker
			$("#wpgeo_location").bind("WPGeo_centerLocation", function(e){
				map.setCenter(marker.getPosition());
			});
			
			// Search Location
			$("#wpgeo_location").bind("WPGeo_searchLocation", function(e){
				var geocoder = new google.maps.Geocoder();
				if ( geocoder ) {
					geocoder.geocode({
						address : e.address,
						region  : e.base_country_code
					}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							map.setCenter(results[0].geometry.location);
							marker.setPosition(results[0].geometry.location);
							marker.setVisible(true);
							$("#wpgeo_location").trigger({
								type   : 'WPGeo_updateMarkerLatLng',
								latLng : results[0].geometry.location,
								lat    : results[0].geometry.location.lat(),
								lng    : results[0].geometry.location.lng()
							});
						} else {
							alert(e.address + " not found");
						}
					});
				}
			});
			
			// Show/hide marker by default?
			marker.setVisible(1);
			
			// Map ready, do other stuff if needed
			$("#wpgeo_location").trigger("WPGeo_adminPostMapReady");
		});
	}
	google.maps.event.addDomListener(window, "load", wpgeo_init_admin_post_map);

})(jQuery);
