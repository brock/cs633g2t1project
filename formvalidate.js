// File formvalidate.js
function validate() {
    //verify fisrtname is more than two characters
	var firstname = document.getElementById("firstname");
	if (firstname.value.length < 2) {
	    alert("Please enter your first name.");
		firstname.focus();
		return false;
    }
    //verify lastname is more than two characters
    var lastname = document.getElementById("lastname");
    if (lastname.value.length < 2) {
        alert("Please enter your last name.");
        lastname.focus();
        return false;
    }
	//verify address is more than 3 characters
	var address = document.getElementById("address")
	if (address.value.length < 3) {
		alert("Please enter your address.");
		address.focus();
		return false;
	}
	//verify city is more than 3 characters
	var city = document.getElementById("city")
	if (city.value.length < 3) {
		alert("Please enter your city.");
		city.focus();
		return false;
	}
	//verify state is at least two characters
	var state = document.getElementById("state")
	if (state.value.length < 2) {
		alert("Please enter your State.");
		state.focus()
		return false;
	}
	//use regular expressions to verify that zip is five numbers (no letters)
	var zip = document.getElementById("zip")
	var validateZip = /^\d{5}$/
	if (zip.value.search(validateZip) == -1) {
		alert("Please a valid zip code.");
		zip.focus();
		return false;
	}
	//use regular expressions to verify that phone is all numbers and in a XXX-XXX-XXXX format
    var phone = document.getElementById("phone")
	var validatePhone = /^[2-9]\d{2}-\d{3}-\d{4}$/
	if (phone.value.search(validatePhone) == -1) {
		alert("Please enter your phone number.e.g. XXX-XXX-XXXX");
		phone.focus();
		return false;
	}
	//use regular expressions to verify email address is a valid format.
	var email = document.getElementById("email")
	var validateEmail = /^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/
	if (email.value.search(validateEmail) == -1) {
		alert("Please a valid email address.");
		email.focus();
		return false;
	}
return true;
}