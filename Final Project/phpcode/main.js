function validateForm() {
	var user = document.myform.username.value;
    var pass = document.myform.password.value;
    if ( user == "" || pass == "") {
        alert("Please Fill All Information");
        return false;
    }
    if (pass.length < 6  ) {
        alert("Password must be at least 6 characters long.");
        return false;
    }
}
