<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
 
<html xmlns="http://www.w3.org/1999/xhtml"> 
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
    <title>Cancer Maps</title> 
	
	<link href="index.css" rel="stylesheet" type="text/css" />

	<?php 	
	// The add.php form submits to this page. If "address" is set, then the user tried to submit the form
	if (isset($_POST["address"])) {
	
	// if the user submitted an address, execute formsubmit.php so we can get lat & lng values
	include('formsubmit.php');

		// if we got a geocoded address and it successfully inserted it into the database,
		// zoom in on the new location and pop up the info box - the info box code is further down
		if (isset($db_insertion_status)) {
			$zoom = 8;
			}
			// if the address didn't work, or something failed, display the broad view map
			else {
				$lat = 30.0;
				$lng = -98.0;
				$zoom = 1;	
			}
	// if the user did not submit a new address, display the broad view map
	} else {
		$lat = 30.0;
		$lng = -98.0;
		$zoom = 1;	
	}
	?>
    	
	
	<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA9UlnCkwzUPP9TWw8ZaakmhTZCY_DCTthKCNyVoucAIe6NKjfYRSKWufBwOoqSoeQE1sDjXY1znSeIA" 
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
		// these php functions are the values for where we center the map and how zoomed in we are - 
		// depending on whether or not the user has added a point
        map.setCenter(new GLatLng(<?php echo "$lat, $lng), $zoom"; ?>); 
 
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
		<?php 
			// if the address was successfully added to the database, 
			// this instructs the script to pop open the info box on the new marker
			if (isset($db_insertion_status)) { ?>
			marker.openInfoWindowHtml(html);
			<?php } ?>	  
      return marker; 
    } 
    //]]> 
  </script> 
 
 
 <script type="text/javascript">

function toggle_text(shown, hidden) {
       var e = document.getElementById(shown);
       var f = document.getElementById(hidden);
    if(e.style.display == 'inline') {
			e.style.display = 'none';
			f.style.display = 'inline';
	}
	else {
			e.style.display = 'inline';
			f.style.display = 'none';
	}
}
</script>

<script type="text/javascript" src="formvalidate.js"></script>
  
  </head> 
 
  <body onload="load()" onunload="GUnload()"> 
    <center>
	<?php if(isset($message)) {
		?>
		<br />
		<div id="message"><?php echo $message; ?></div>
		<?php 
	} ?>
	<!-- the header -->
		<div id="head" style="width: 500px; height: 50px"><h2><a href="index.php">Cancer Maps</a></h2></div>
	
	<!-- display the map -->
		<div id="map" style="width: 600px; height: 400px"></div> 
	
	<!-- display text under the map - we could use this to provide navigation controls perhaps -->	
		<div id="underMap" style="width: 600px;">
			
			<div id="underMapHead" style="height: 30px"></div>
			
			<div id="shown_first" style="display:inline">
				<a style="cursor:pointer" onclick="toggle_text('shown_first', 'hidden_first')">
				Add your point to the map
				</a>
			</div>
			<div id="hidden_first" style="display:none">

			<form id="form1" action="index.php" method="post" onsubmit="return validate();">
	<table class="formpage">
		<caption>Add Point to Map</caption>
		<tr>
			<td colspan=2 align=center><b>Personal Information</b></td>
		<tr>
			<td><b>First Name:</b></td> <td><input type="text" size="20" name="firstname" id="firstname"/></td>
		</tr>
		<tr>
			<td><b>Last Name:</b></td> <td><input type="text" size="20" name="lastname" id="lastname"/></td>
		</tr>
		<tr>
			<td><b>Street Address:</b></td> <td><input type="text" size="30" name="address" id="address" /></td>
		</tr>
		<tr>
			<td><b>Email:</b></td> <td><input type="text" size="15" name="email" id="email" /></td>
		</tr>
		<tr>
		<tr>
			<td colspan=2 align=center><b>Medical Information</b></td>
		</tr>
		<tr>
			<caption>Medical Information</caption>
			<tr>
				<td><b>Diagnosis Date:</b></td> <td>
				<!-- thanks: http://www.glodev.com/script_view.php?ScriptID=29 -->
				<select name="month" id="month">
					<option value="1">January
					<option value="2">February
					<option value="3">March
					<option value="4">April
					<option value="5">May
					<option value="6">June
					<option value="7">July
					<option value="8">August
					<option value="9">September
					<option value="10">October
					<option value="11">November
					<option value="12">December
				</select>
				<select name="day" id="day">
					<option value="1">1
					<option value="2">2
					<option value="3">3
					<option value="4">4
					<option value="5">5
					<option value="6">6
					<option value="7">7
					<option value="8">8
					<option value="9">9
					<option value="10">10
					<option value="11">11
					<option value="12">12
					<option value="13">13
					<option value="14">14
					<option value="15">15
					<option value="16">16
					<option value="17">17
					<option value="18">18
					<option value="19">19
					<option value="20">20
					<option value="21">21
					<option value="22">22
					<option value="23">23
					<option value="24">24
					<option value="25">25
					<option value="26">26
					<option value="27">27
					<option value="28">28
					<option value="29">29
					<option value="30">30
					<option value="31">31
				</select>
				<select name="year" id="year">
					<option value="1900">1900
					<option value="1901">1901
					<option value="1902">1902
					<option value="1903">1903
					<option value="1904">1904
					<option value="1905">1905
					<option value="1906">1906
					<option value="1907">1907
					<option value="1908">1908
					<option value="1909">1909
					<option value="1910">1910
					<option value="1911">1911
					<option value="1912">1912
					<option value="1913">1913
					<option value="1914">1914
					<option value="1915">1915
					<option value="1916">1916
					<option value="1917">1917
					<option value="1918">1918
					<option value="1919">1919
					<option value="1920">1920
					<option value="1921">1921
					<option value="1922">1922
					<option value="1923">1923
					<option value="1924">1924
					<option value="1925">1925
					<option value="1926">1926
					<option value="1927">1927
					<option value="1928">1928
					<option value="1929">1929
					<option value="1930">1930
					<option value="1931">1931
					<option value="1932">1932
					<option value="1933">1933
					<option value="1934">1934
					<option value="1935">1935
					<option value="1936">1936
					<option value="1937">1937
					<option value="1938">1938
					<option value="1939">1939
					<option value="1940">1940
					<option value="1941">1941
					<option value="1942">1942
					<option value="1943">1943
					<option value="1944">1944
					<option value="1945">1945
					<option value="1946">1946
					<option value="1947">1947
					<option value="1948">1948
					<option value="1949">1949
					<option value="1950">1950
					<option value="1951">1951
					<option value="1952">1952
					<option value="1953">1953
					<option value="1954">1954
					<option value="1955">1955
					<option value="1956">1956
					<option value="1957">1957
					<option value="1958">1958
					<option value="1959">1959
					<option value="1960">1960
					<option value="1961">1961
					<option value="1962">1962
					<option value="1963">1963
					<option value="1964">1964
					<option value="1965">1965
					<option value="1966">1966
					<option value="1967">1967
					<option value="1968">1968
					<option value="1969">1969
					<option value="1970">1970
					<option value="1971">1971
					<option value="1972">1972
					<option value="1973">1973
					<option value="1974">1974
					<option value="1975">1975
					<option value="1976">1976
					<option value="1977">1977
					<option value="1978">1978
					<option value="1979">1979
					<option value="1980">1980
					<option value="1981">1981
					<option value="1982">1982
					<option value="1983">1983
					<option value="1984">1984
					<option value="1985">1985
					<option value="1986">1986
					<option value="1987">1987
					<option value="1988">1988
					<option value="1989">1989
					<option value="1990">1990
					<option value="1991">1991
					<option value="1992">1992
					<option value="1993">1993
					<option value="1994">1994
					<option value="1995">1995
					<option value="1996">1996
					<option value="1997">1997
					<option value="1998">1998
					<option value="1999">1999
					<option value="2000">2000
					<option value="2001">2001
					<option value="2002">2002
					<option value="2003">2003
					<option value="2004">2004
					<option value="2005">2005
					<option value="2006">2006
					<option value="2007">2007
					<option value="2008">2008
					<option value="2009">2009
					<option value="2010">2010
				</select>
			</tr>
			<tr>
				<td><b>Diagnosis Type:</b></td> 
				<td>
				<select name="diagtype" id="diagtype">
				<option value="select">Select...</option>
				<option value="Lung Cancer">Lung Cancer</option>
				<option value="Breast Cancer">Breast Cancer</option>
				<option value="Leukemia">Leukemia</option>
				<option value="Hodgkins">Hodgkins</option>
				<option value="Non-Hodgkins">Non-Hodgkins</option>
				<option value="Colon Cancer">Colon Cancer</option>
				</select>
				</td>
			</tr>
			<td colspan="2"><input type="submit" value="Submit" name="submit" /> or <a style="cursor:pointer" onclick="toggle_text('shown_first', 'hidden_first')">cancel</a></td>
		</tr>
	</table>
</form>
	<center>
		<h3>Data added before September 2010 will not be retained.</h3>
	</center>
			</div>

		
		</div>
	
	</center>
  </body> 
</html>