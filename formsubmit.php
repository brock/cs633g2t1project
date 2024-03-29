<?php
// for some reason, when I used "require" instead of "include" this wouldn't work.
include("dbinfo.php");

$booFirstname = 0;
$booLastname = 0;
$booEmail = 0;
$booAddress = 0;
$booCity = 0;
$booState = 0;
$booZip = 0;
$booDiagdate = 0;
$booDiagtype = 0;

global $address;
global $city;
global $state;
global $zip;
global $lat;
global $lng;

$host="localhost"; // Host name
// $username="root"; // Mysql username
// $password="test"; // Mysql password
$db_name="cancermaps"; // Database name
$tbl_name1="person"; // Table name #1
$tbl_name2="address"; // Table name #2
$tbl_name3="diagnosis"; // Table name #3
$tbl_name4="illnesstype"; // Table name #4

if (isset($_POST["submit"])) {
//firstname Field Validation
	if($_POST["firstname"] == NULL) {
		$booFirstname = 1;
		$message = "Please enter your First Name";
	}
	else {
		$firstname = $_POST["firstname"];
	}
//lastname Field Validation
	if($_POST["lastname"] == NULL) {
		$booLastname = 1;
		$message = "Please enter your Last Name";
	}
	else {
		$lastname = $_POST["lastname"];
	}
//address Field Validation
	if($_POST["address"] == NULL) {
		$booAddress = 1;
		$message = "Please enter your Address";
	}
	else {
		$address = $_POST["address"];
	}
//email Field Validation
	if($_POST["email"] == NULL) {
		$booEmail = 1;
		$message = "Please enter your email address";
	}
	else {
		$email = $_POST["email"];
	}
//Month Fields Validation
	if($_POST["month"] == "select") {
		$booDiagdate = 1;
		$message = "Please enter your Diagnosis Month";
	}
	else {
		$month = $_POST["month"];
	}
	//Day Fields Validation
	if($_POST["day"] == "select") {
		$booDiagdate = 1;
		$message = "Please enter your Diagnosis Day";
	}
	else {
		$day = $_POST["day"];
	}
//Year Fields Validation
	if($_POST["year"] == "select") {
		$booDiagdate = 1;
		$message = "Please enter your Diagnosis Year";
	}
	else {
		$year = $_POST["year"];
	}
if ($month + $day + $year) {
	$diagdate = $year."-".$month."-".$day;
	}
//Diagnosis Type Validation
	if($_POST["diagtype"] == "select") {
		$booDiagtype = 1;
		$message = "Please select your diagnosis type.";
	}
	else {
		$diagtype = $_POST["diagtype"];
	}
}


// the following php section was taken from here:
// http://www.w3schools.com/php/func_filter_input_array.asp
$filters = array
  (
	  "firstname" => array
	    (
	    "filter"=>FILTER_SANITIZE_STRING
	    ),
	  "lastname" => array
	    (
	    "filter"=>FILTER_SANITIZE_STRING
	    ),
	  "email"=> FILTER_VALIDATE_EMAIL,
	  "address"=> array
	  (
	  "filter"=>FILTER_SANITIZE_STRING
	  )
  );
$result = filter_input_array(INPUT_POST, $filters);
// Use this to display the array of all items submitted
// print_r($result);

if (!$result["firstname"])
  {
  $message = "First Name is not valid.";
  }
elseif(!$result["lastname"])
  {
  $message = "Last Name is not valid.";
  }
elseif(!$result["address"])
  {
  $message = "Address is not valid.";
  }
elseif(!$result["email"])
  {
  $message = "E-Mail is not valid.";
  }
else
  {
  //echo("User input is valid");
  }
  
// end of sample code from here: http://www.w3schools.com/php/func_filter_input_array.asp


//if (!($booFirstname + $booLastname + $booEmail + $booDiagdate + $booDiagtype) && isset($_POST["submit"])) {
if (!($booFirstname + $booLastname + $booEmail + $booAddress+ $booCity + $booState + $booZip + $booDiagdate + $booDiagtype) && isset($_POST["submit"])) {

	// attempt to geocode the address
	include ("./geocode.php");
	
	// if the geocode was successful, it will return status of 200. If so, proceed
	if($status == 200) {
		// Connect to server and select database.
		mysql_connect($host, $username, $password)or die("cannot connect");
		mysql_select_db($db_name)or die("cannot select DB");

		//Insert data into Address Table
		$sql2="INSERT INTO $tbl_name2(lat, lng, street1)VALUES('$lat', '$lng', '$address')";
		$result2=mysql_query($sql2);
		$lastitemid1 = mysql_insert_id();
		
		//Insert data into Person Table
		$sql1="INSERT INTO $tbl_name1(firstname, lastname, email, addressid)VALUES('$firstname', '$lastname', '$email', '$lastitemid1')";
		$result1=mysql_query($sql1);
		$lastitemid2 = mysql_insert_id();
		
		//Insert data into IllnessType Table
		$sql4="INSERT INTO $tbl_name4(illnesstype)VALUES('$diagtype')";
		$result4=mysql_query($sql4);
		$lastitemid3 = mysql_insert_id();
		
		//Insert data into Diagnosis Table
		$sql3="INSERT INTO $tbl_name3(diagnosisdate, personid, illnesstypeid)VALUES('$diagdate', '$lastitemid2', '$lastitemid3')";
		$result3=mysql_query($sql3);
		
		//test
		// if successfully insert data into database, displays message "Successful".
			if($result1 + $result2 + $result3 + $result4){
				$db_insertion_status = 1;
		}
	// if it didn't successfully submit to the database
	else {
		$message = "We could not submit your information to the database.";
		}
	}
	// if the geocoding wasn't successful
	else {
		$message = "The address you entered did not return a real result.";
	}
	
	// //Close connection
	// "Using mysql_close() isn't usually necessary, as non-persistent open links are automatically closed at the end of the script's execution. See also freeing resources."
	// this was causing apache to crash and is not necessary
	// http://php.net/manual/en/function.mysql-close.php
	// mysql_close();
	}
?>