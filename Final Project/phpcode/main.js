/*jS an Jquery code store here*/

/* validform login */
function validateLoginForm() {
	var user = document.myLoginForm.username.value;
    var pass = document.myLoginForm.password.value;
    if ( user == "" || pass == "") {
        alert("Please Fill All Information");
        return false;
    }
    if (pass.length < 6  ) {
        alert("Password must be at least 6 characters long.");
        return false;
    }
}
/* validform register */
function validateRegisterForm() {
	var user = document.myRegisterForm.username.value;
        var pass = document.myRegisterForm.password.value;
        var addre = document.myRegisterForm.address.value;
        var pass2 = document.myRegisterForm.password2.value;
        var fname = document.myRegisterForm.fullname.value;
        var phonee = document.myRegisterForm.phone.value;
        var images = document.myRegisterForm.image.value;
        var date = document.myRegisterForm.dateofbirth.value;
        var rol = document.myRegisterForm.role.value;
                
		if ( phonee == "" || images == "" || date == "" || rol == "" || user == "" || fname =="" || addre == "") {
                    alert("Please Fill All Information");
                    return false;
                }
                if (pass.length < 6  ) {
                    alert("Password must be at least 6 characters long.");
                    return false;
                }
                if (pass2.length < 6 ) {
                    alert("Password must be at least 6 characters long.");
                    return false;
                }
                if (pass==pass2) {
                    return true;
                }
                else if (pass!=pass2) {
                    alert("password must be same!")
                    return false;
                }
            }   
/* validform lostpassword */
function validateLostPassForm() {
	var user = document.myLostPassForm.username.value;
	var phonee = document.myLostPassForm.phone.value;
	if ( phonee == ""|| user == ""  ) {
        alert("Please Fill All Information");
        return false;
    }
}
