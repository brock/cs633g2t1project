<?php
require("dbinfo.php");

// Start XML file, create parent node 
 
$dom = new DOMDocument("1.0"); 
$node = $dom->createElement("markers"); 
$parnode = $dom->appendChild($node);  
 
// Opens a connection to a MySQL server 
 
$connection=mysql_connect ("localhost", $username, $password); 
if (!$connection) {  die('Not connected : ' . mysql_error());}  
 
// Set the active MySQL database 
 
$db_selected = mysql_select_db('cancermaps', $connection); 
if (!$db_selected) { 
  die ('Can\'t use db : ' . mysql_error()); 
}  
 
// Select all the rows in the markers table 
 
$query = "SELECT * FROM person inner join diagnosis on person.personID = 
	diagnosis.personID inner join illnesstype on illnesstype.illnessTypeID = 
	diagnosis.illnessTypeID inner join address on address.addressID = 
	person.addressID"; 
$result = mysql_query($query); 
if (!$result) {   
  die('Invalid query: ' . mysql_error()); 
}  
 
header("Content-type: text/xml");  
 
// Iterate through the rows, adding XML nodes for each 

 
while ($row = @mysql_fetch_assoc($result)){   
  // ADD TO XML DOCUMENT NODE   
  $node = $dom->createElement("marker");   
  $newnode = $parnode->appendChild($node);    
  $newnode->setAttribute("firstname",$row['firstName']); 
  $newnode->setAttribute("lastname",$row['lastName']); 
  $newnode->setAttribute("illnesstype",$row['illnessType']); 
  $newnode->setAttribute("lat",$row['lat']); 
  $newnode->setAttribute("lng",$row['lng']); 
}  
 
echo $dom->saveXML(); 
 
?>