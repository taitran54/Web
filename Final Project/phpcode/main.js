/* validform login */
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
/* validform register */
function validateForm() {
	var user = document.myform.username.value;
        var pass = document.myform.password.value;
        var addre = document.myform.address.value;
        var pass2 = document.myform.password2.value;
        var fname = document.myform.fullname.value;
        var phonee = document.myform.phone.value;
        var images = document.myform.image.value;
        var date = document.myform.dateofbirth.value;
        var rol = document.myform.role.value;
                
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
function validateForm() {
	var user = document.myform.username.value;
	var phonee = document.myform.phone.value;
	if ( phonee == ""|| user == ""  ) {
        alert("Please Fill All Information");
        return false;
    }
}
