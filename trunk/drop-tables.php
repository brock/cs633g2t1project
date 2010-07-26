<?php
if (isset($_POST['delete'])) {

		include("dbinfo.php");
		mysql_connect($host, $username, $password)or die("cannot connect");
		mysql_select_db($database)or die("cannot select DB");

		$drop_person = "TRUNCATE table person";
		$drop_address = "TRUNCATE table address";
		$drop_diagnosis = "TRUNCATE table diagnosis";
		$drop_illnesstype = "TRUNCATE table illnesstype";
		$drop_person_result = mysql_query($drop_person);
		$drop_address_result = mysql_query($drop_address);
		$drop_diagnosis_result = mysql_query($drop_diagnosis);
		$drop_illnesstype_result = mysql_query($drop_illnesstype);
		if(!($drop_person_result + $drop_address_result + $drop_diagnosis_result + $drop_illnesstype_result))	{
			die('Nothing was deleted.'. mysql_error());
		}
		else {
			echo "Tables are gone. Go see: ";
			echo "<a href='index.php'>Home</a>";
		}
} else {
	header('Location: index.php');
}
?>