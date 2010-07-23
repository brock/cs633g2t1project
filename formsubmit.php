<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Script-Type" content="text/javascript"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Style sheet definition -->
<link href="default.css" rel="stylesheet" type="text/css" />

<!-- JavaScript -->
<script type="text/javascript" src="rollover.js">
</script>
<title>Group 2.1 -- Assignment 3</title>


</head>

<body>
<b>Thank you for your submission</b>
<?php
$booFirstname = 0;
$booLastname = 0;
$booEmail = 0;

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="test"; // Mysql password
$db_name="cancermaps"; // Database name
$tbl_name="person"; // Table name

if (isset($_POST["submit"])) {
//firstname Field Validation
	if($_POST["firstname"] == NULL) {
		$booFirstname = 1;
		echo "<p>Please enter your First Name</p>";
	}
	else {
		$firstname = $_POST["firstname"];
	}
//lastname Field Validation
	if($_POST["lastname"] == NULL) {
		$booLastname = 1;
		echo "<p>Please enter your Last Name</p>";
	}
	else {
		$lastname = $_POST["lastname"];
	}
//address Field Validation
/*	if($_POST["address"] == NULL) {
		$booAddress = 1;
		echo "<p>Please enter your Address</p>";
	}
	else {
		$address = $_POST["address"];
	}
//city Field Validation
	if($_POST["city"] == NULL) {
		$booCity = 1;
		echo "<p>Please enter your City</p>";
	}
	else {
		$city = $_POST["city"];
	}
//state Field Validation
	if($_POST["state"] == NULL) {
		$booState = 1;
		echo "<p>Please enter your State</p>";
	}
	else {
		$state = $_POST["state"];
	}
//zip Field Validation
	if($_POST["zip"] == NULL) {
		$booZip = 1;
		echo "<p>Please enter your Zip Code</p>";
	}
	else {
		$zip = $_POST["zip"];
	}*/
//email Field Validation
	if($_POST["email"] == NULL) {
		$booEmail = 1;
		echo "<p>Please enter your email address</p>";
	}
	else {
		$email = $_POST["email"];
	}
//diagdate Field Validation
	/*if($_POST["diagdate"] == NULL) {
		$booDiagdate = 1;
		echo "<p>Please enter your Diagnosis Date</p>";
	}
	else {
		$diagdate = $_POST["diagdate"];
	}
//select box Validation
	if($_POST["diagtype"] == "select") {
		$booType = 1;
	echo "<p>Please select you diagnosis type.</p>";
	}
	else {
		$diagtype = $_POST["diagtype"];
	}*/
}
//if (!($booFirstname + $booLastname + $booAddress+ $booCity + $booState + $booZip + $booEmail + $booDiagdate + $booDiagtype) && isset($_POST["submit"])) {
if (!($booFirstname + $booLastname + $booEmail) && isset($_POST["submit"])) {

	echo "We are connecting to the database.";
		
	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");

	//Insert data into MySQL
	$sql="INSERT INTO $tbl_name(firstname, lastname, email)VALUES('$firstname', '$lastname', '$email')";
	$result=mysql_query($sql);
	//test
	// if successfully insert data into database, displays message "Successful".
		if($result){
			echo "<Center><b>Thank you for your submission!</b>";
			echo "<a href='index.html'>Back to main page</a>";
	}
		else {
			echo "ERROR";
		}
	
	//Close connection
	mysql_close();
	}
	else {
	echo "We did not connect to the database.";
	}
	?>
</body>
</html>

