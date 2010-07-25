<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
 
<html xmlns="http://www.w3.org/1999/xhtml"> 
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
    <title>Cancer Maps</title> 
    <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAjU0EJWnWPMv7oQ-jjS7dYxTPZYElJSBeBUeMSX5xXgq6lLjHthSAk20WnZ_iuuzhMt60X_ukms-AUg" 
            type="text/javascript"></script> 
 
    <script type="text/javascript"> 
    //<![CDATA[ 
 
    var iconBlue = new GIcon();  
    iconBlue.image = 'http://labs.google.com/ridefinder/images/mm_20_blue.png'; 
    iconBlue.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'; 
    iconBlue.iconSize = new GSize(12, 20); 
    iconBlue.shadowSize = new GSize(22, 20); 
    iconBlue.iconAnchor = new GPoint(6, 20); 
    iconBlue.infoWindowAnchor = new GPoint(5, 1); 
 
    var iconRed = new GIcon();  
    iconRed.image = 'http://labs.google.com/ridefinder/images/mm_20_red.png'; 
    iconRed.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'; 
    iconRed.iconSize = new GSize(12, 20); 
    iconRed.shadowSize = new GSize(22, 20); 
    iconRed.iconAnchor = new GPoint(6, 20); 
    iconRed.infoWindowAnchor = new GPoint(5, 1); 
 
    var iconBrown = new GIcon();  
    iconBrown.image = 'http://labs.google.com/ridefinder/images/mm_20_brown.png'; 
    iconBrown.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'; 
    iconBrown.iconSize = new GSize(12, 20); 
    iconBrown.shadowSize = new GSize(22, 20); 
    iconBrown.iconAnchor = new GPoint(6, 20); 
    iconBrown.infoWindowAnchor = new GPoint(5, 1); 
	
    var iconGreen = new GIcon();  
    iconGreen.image = 'http://labs.google.com/ridefinder/images/mm_20_green.png'; 
    iconGreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'; 
    iconGreen.iconSize = new GSize(12, 20); 
    iconGreen.shadowSize = new GSize(22, 20); 
    iconGreen.iconAnchor = new GPoint(6, 20); 
    iconGreen.infoWindowAnchor = new GPoint(5, 1); 
	
	var iconBlack = new GIcon();  
    iconBlack.image = 'http://labs.google.com/ridefinder/images/mm_20_black.png'; 
    iconBlack.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'; 
    iconBlack.iconSize = new GSize(12, 20); 
    iconBlack.shadowSize = new GSize(22, 20); 
    iconBlack.iconAnchor = new GPoint(6, 20); 
    iconBlack.infoWindowAnchor = new GPoint(5, 1); 
	
	var iconPurple = new GIcon();  
    iconPurple.image = 'http://labs.google.com/ridefinder/images/mm_20_purple.png'; 
    iconPurple.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'; 
    iconPurple.iconSize = new GSize(12, 20); 
    iconPurple.shadowSize = new GSize(22, 20); 
    iconPurple.iconAnchor = new GPoint(6, 20); 
    iconPurple.infoWindowAnchor = new GPoint(5, 1); 

    var customIcons = []; 
    customIcons["Lung Cancer"] = iconBrown; 
    customIcons["Breast Cancer"] = iconPurple; 
    customIcons["Leukemia"] = iconGreen; 
    customIcons["Hodgkins"] = iconRed; 
    customIcons["Non-Hodgkins"] = iconBlue; 
    customIcons["Colon Cancer"] = iconBlack; 
				
    function load() { 
      if (GBrowserIsCompatible()) { 
        var map = new GMap2(document.getElementById("map")); 
        map.enableScrollWheelZoom()
		map.addControl(new GLargeMapControl3D()); 
        map.addControl(new GMapTypeControl()); 
        map.setCenter(new GLatLng(40.0, -98.0), 3); 
 
        GDownloadUrl("xml.php", function(data) { 
          var xml = GXml.parse(data); 
          var markers = xml.documentElement.getElementsByTagName("marker"); 
          for (var i = 0; i < markers.length; i++) { 
            var firstname = markers[i].getAttribute("firstname"); 
            var lastname = markers[i].getAttribute("lastname"); 
            var theType = markers[i].getAttribute("illnesstype"); 
            var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")), 
                                    parseFloat(markers[i].getAttribute("lng"))); 
            var marker = createMarker(point, firstname, lastname, theType);
            map.addOverlay(marker); 
          } 
        }); 
      } 
    } 
 
    function createMarker(point, firstname, lastname, theType) {
      var marker = new GMarker(point, customIcons[theType]); 
      var html = "<b>" + firstname  + " " + lastname + "</b> <br/>" + theType; 
      GEvent.addListener(marker, 'click', function() { 
        marker.openInfoWindowHtml(html); 
      }); 
      return marker; 
    } 
    //]]> 
  </script> 
 
  </head> 
 
  <body onload="load()" onunload="GUnload()"> 
    <center>
	
	<!-- the header -->
		<div id="head" style="width: 500px; height: 50px"><h2>Cancer Maps</h2></div>
	
	<!-- display the map -->
		<div id="map" style="width: 600px; height: 400px"></div> 
	
	<!-- display text under the map - we could use this to provide navigation controls perhaps -->	
		<div id="underMap" style="width: 500px; height: 300px;">
			<div id="underMapHead" style="height: 30px"></div>
			<a href="./add.php">Add your point to the map</a>
		</div>
	
	</center>
  </body> 
</html>