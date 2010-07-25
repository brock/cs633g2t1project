<?php
define("MAPS_HOST", "maps.google.com");


//this is a my own personal key
define("KEY", "ABQIAAAAR3CaSE2qqeWGkC56FEsbQRTPbgwNZ2RKRODPuAlSED3BkqR1ExT5er_UOINhI1C2R3cVPWZmbVNDAw");

$base_url = "http://" . MAPS_HOST . "/maps/geo?output=xml" . "&key=" . KEY;

//my address
// $address = "8730 Costa Verde Blvd San Diego, CA";
$fullAddress = $address." ".$city.", ".$state." ".$zip;

$request_url = $base_url . "&q=" . urlencode($fullAddress);

//xml request
$xml = simplexml_load_file($request_url) or die("url not loading");

//get status from xml response
$status = $xml->Response->Status->code;

//if response is 200 then it is good
// echo "Response status is: " . $status . "\n";

if (strcmp($status, "200") == 0) {
	$coordinates = $xml->Response->Placemark->Point->coordinates;
	$coordinatesSplit = explode(",", $coordinates);
	
	// Format: Longitude, Latitude, Altitude
	$lat = $coordinatesSplit[1];
	$lng = $coordinatesSplit[0];

	echo "The full address is $fullAddress.<br />";
	echo "The latitude is: " . $lat . "<br />";	
	echo "The longitude is: " . $lng . "<br />";
}
return ($status);
?>