var joe = ['Joe', 'Fox', '201 West 83rd St.', 'New York', 'NY', '10024', 'joe@youvegotmail.com', '1970', '10', '20', 'Lung Cancer'];
var chuck = ['Chuck', 'Noland', '100 Universal City Plaza', 'Universal City', 'CA', '91608', 'chuck@fedex.com', '1962', '3', '15', 'Non-Hodgkins'];
var robert = ['Robert', 'Langdon', '340 Royce Dr', 'Los Angeles', 'CA', '90095', 'robert@ucla.com', '1952', '9', '30', 'Breast Cancer'];
var sam = ['Sam', 'Baldwin', 'Westlake Ave', 'Seattle', 'WA', '98101', 'joe@youvegotmail.com', '1985', '2', '5', 'Breast Cancer'];
var carl = ['Carl', 'Hanratty', '101 W Third', 'Kansas City', 'KS', '64101', 'carl@hanratty.com', '1944', '1', '15', 'Leukemia'];
var scott = ['Scott', 'Turner', '150 W Washington', 'Boise', 'ID', '83601', 'scott@turner.com', '1976', '5', '10', 'Colon Cancer'];
var walter = ['Walter', 'Fielding', '1800 W First', 'Salt Lake City', 'UT', '84081', 'walter@fielding.com', '1973', '1', '11', 'Lung Cancer'];
var josh = ['Josh', 'Baskin', '435 Greenmount Avenue', 'Cliffside Park', 'NJ', '07010', 'josh@baskin.com', '1992', '4', '4', 'Hodgkins'];
var white = ['Mr', 'White', '3400 Wilshire Blvd.', 'Los Angeles', 'CA', '90095', 'mr@white.com', '1962', '11', '28', 'Hodgkins'];

// thanks: http://stackoverflow.com/questions/952457/javascript-using-variable-as-array-name

function insert_person(person) {
	document.getElementById("firstname").value=this[person][0];
	document.getElementById("lastname").value=this[person][1];
	document.getElementById("address").value=this[person][2];
	document.getElementById("city").value=this[person][3];
	document.getElementById("state").value=this[person][4];
	document.getElementById("zip").value=this[person][5];
	document.getElementById("email").value=this[person][6];
	document.getElementById("year").value=this[person][7];
	document.getElementById("month").value=this[person][8];
	document.getElementById("day").value=this[person][9];
	document.getElementById("diagtype").value=this[person][10];
	return true;
	}



