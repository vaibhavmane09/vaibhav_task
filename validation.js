function formValidate(){
    var namepattern = /^[A-Za-z\s]+$/;
	var numberpattern = /^[0-9]+$/;
	var emailpattern = /^[A-Za-z0-9._]{3,}@[A_Za-z]{3,}[.]{1}[A-Za-z.]{2,6}/;
	var unamepattern = /^[a-zA-Z][a-zA-Z0-9_]{2,15}$/;

	var passpattern = /^(?=.*[0-9])(?=.*[- ?!@#$%^&*])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9- ?!@#$%^&*]{6,20}$/;


    var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var mobno = document.getElementById('mobno').value;
	var address = document.getElementById('address').value;
	var pwd = document.getElementById('pwd').value;

    //Name validation code*/
	if (name == "" || name.length < 3 || name.length > 15) {
		alert("Please provide a valid first name");
		document.myForm.name.focus();
		document.myForm.name.style.border = "solid 1px red";
		return false;
	}
	if (!name.match(namepattern)) {
		alert("Please provide your Name");
		document.myForm.name.focus();
		document.myForm.name.style.border = "solid 1px red";
		return false;
	}
	else {
		document.myForm.name.focus();
		document.myForm.name.style.border = "none";
	}
	//Name validation code ends here*/

    //mobile number validation code 
	if (mobno == "" || mobno.length < 10 || mobno.length > 10) {
		alert("Please provide valid mobile number");
		document.myForm.mobno.focus();
		document.myForm.mobno.style.border = "solid 1px red";
		return false;
	}
	if (!mobno.match(numberpattern)) {
		alert("Mobile number must be 10 digit Number only");
		document.myForm.mobno.focus();
		document.myForm.mobno.style.border = "solid 1px red";
		return false;
	}
	else {
		document.myForm.mobno.focus();
		document.myForm.mobno.style.border = "none";
	}
	//mobile number validation code end here

	//email validation code 
	if (email == "") {
		alert("Please valid email");
		document.myForm.email.focus();
		document.myForm.email.style.border = "solid 1px red";
		return false;
	}
	if (!email.match(emailpattern)) {
		alert("Invalid email format, Missing '@' symbol, or Invalid domain name. ");
		document.myForm.email.focus();
		document.myForm.email.style.border = "solid 1px red";
		return false;
	}
	else {
		document.myForm.email.focus();
		document.myForm.email.style.border = "none";
	}
    //email validation code ends here

    //password validation code
	if (pwd == "") {
		alert("Please provide valid password");
		document.myForm.pwd.focus();
		document.myForm.pwd.style.border = "solid 1px red";
		return false;
	}
	if (!pwd.match(passpattern)) {
		alert("Your password must be at least 8 characters long, contain at least one number, one symbole and have a mixture of uppercase and lowercase letters");
		document.myForm.pwd.focus();
		document.myForm.pwd.style.border = "solid 1px red";
		return false;
	}
	else {
		document.myForm.pwd.focus();
		document.myForm.pwd.style.border = "none";
	}

	//Password validation code end.

	//Address validation code.
	if (address.trim() === "" || address.length < 5) {
		alert("Please enter your Address");
		document.myForm.address.focus();
		document.myForm.address.style.border = "solid 1px red";
		return false;
	}
	else {
		document.myForm.address.focus();
		document.myForm.address.style.border = "none";
	}
	//Adddress validation code end.

	return true; //
}