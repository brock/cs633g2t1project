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
		
		<!-- remove after testing -->
		<script type="text/javascript" src="test-data.js"></script>
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
<form id="form1" action="formsubmit.php" method="post" onsubmit="return validate();">
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
			<td><b>State:</b></td> 
			<td>
			<!-- compliments of here: http://codesnippets.joyent.com/posts/show/873 -->
			<select id="state" name="state">
				<option value="select">Select One</option>
				<optgroup label="U.S. States">
				<option value="AK">Alaska</option>
				<option value="AL">Alabama</option>
				<option value="AR">Arkansas</option>
				<option value="AZ">Arizona</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DC">District of Columbia</option>
				<option value="DE">Delaware</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="IA">Iowa</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="MA">Massachusetts</option>
				<option value="MD">Maryland</option>
				<option value="ME">Maine</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MO">Missouri</option>
				<option value="MS">Mississippi</option>
				<option value="MT">Montana</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="NE">Nebraska</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NV">Nevada</option>
				<option value="NY">New York</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="PR">Puerto Rico</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VA">Virginia</option>
				<option value="VT">Vermont</option>
				<option value="WA">Washington</option>
				<option value="WI">Wisconsin</option>
				<option value="WV">West Virginia</option>
				<option value="WY">Wyoming</option>
				</optgroup>
				
				<optgroup label="Canadian Provinces">
				<option value="AB">Alberta</option>
				<option value="BC">British Columbia</option>
				<option value="MB">Manitoba</option>
				<option value="NB">New Brunswick</option>
				<option value="NF">Newfoundland</option>
				<option value="NT">Northwest Territories</option>
				<option value="NS">Nova Scotia</option>
				<option value="NU">Nunavut</option>
				<option value="ON">Ontario</option>
				<option value="PE">Prince Edward Island</option>
				<option value="QC">Quebec</option>
				<option value="SK">Saskatchewan</option>
				<option value="YT">Yukon Territory</option>
				</optgroup>
				</select>
				</td>
		</tr>
		<tr>
			<td><b>Zip: xxxxxx</b></td> <td><input type="text" size="5" name="zip" id="zip" /></td>
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
			<td colspan="2"><input type="submit" value="Submit" name="submit" /> or go <a href="../">Back to Map</a></td>
		</tr>
	</table>
</form>

<!-- remove after testing -->
<?php include('test-inserts.php'); ?>

</body>
</html>