<?php
define("MAPS_HOST", "maps.google.com");


//this is the cancermaps.org key
define("KEY", "ABQIAAAA9UlnCkwzUPP9TWw8ZaakmhTZCY_DCTthKCNyVoucAIe6NKjfYRSKWufBwOoqSoeQE1sDjXY1znSeIA");

$base_url = "http://" . MAPS_HOST . "/maps/geo?output=xml" . "&key=" . KEY;

//my address
// $address = "8730 Costa Verde Blvd San Diego, CA";

$request_url = $base_url . "&q=" . urlencode($address);

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
	
}
return ($status);
?>