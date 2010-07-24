<!-- Lars Jowers -->
<!-- MET CS 633 -->
<!-- Assignment 2 -->

<!-- XHTML Heading -->
<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
   "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>
		<meta http-equiv="Content-Script-Type" content="text/javascript"/>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

		<!-- Style sheet definition -->
		<link href="index.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="formvalidate.js"></script>
		<title>
			Add Point to Cancer Maps
		</title>
	</head>

<body>

<!-- if this page is being loaded after the user submits new data, confirm it or show an error -->


<!-- creates a buffer to center the add field on the page --> 
<div id="head" style="width: 500px; height: 50px"></div>
		
<!-- Uses formvalidate.js for the validate() function -->
<!-- Uses table.form in CSS to format table for form -->
<!-- add.php handles form submission -->
<form id="form1" action="formsubmit.php" method="post" onsubmit="return validate();";>
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
			<td><b>City:</b></td> <td><input type="text" size="30" name="city" id="city" /></td>
		</tr>
		<tr>
			<td><b>State:(e.g. FL or Florida)</b></td> <td><input type="text" size="30" name="state" id="state" /></td>
		</tr>
		<tr>
			<td><b>Zip: XXXXX</b></td> <td><input type="text" size="5" name="zip" id="zip" /></td>
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
				<td><b>Diagnosis Date:</b></td> <td><input type="text" size="15" name ="diagdate" id="diagdate" /></td>
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
			<td colspan="2"><input type="submit" value="Submit" name="submit" /> or go <a href="../">Back to Map</a></td>
		</tr>
	</table>
</form>


</body>
</html>