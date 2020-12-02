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

/* Open and Close for Sidebar */
function w3_open() {
	document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
	document.getElementById("mySidebar").style.display = "none";
}

function myFunction() {
	var x = document.getElementById("demo");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
	} else { 
		x.className = x.className.replace(" w3-show", "");
	}
	}
				
function myFunction1() {
	var x = document.getElementById("demo1");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " w3-green";
	} else { 
		x.className = x.className.replace(" w3-show", "");
		x.previousElementSibling.className = 
		x.previousElementSibling.className.replace(" w3-green", "");
	}
	}
	
function myFunction2() {
	var x = document.getElementById("demo2");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " w3-green";
	} else { 
		x.className = x.className.replace(" w3-show", "");
		x.previousElementSibling.className = 
		x.previousElementSibling.className.replace(" w3-green", "");
	}
	}
				
function myFunction3() {
	var x = document.getElementById("demo3");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " w3-green";
	} else { 
		x.className = x.className.replace(" w3-show", "");
		x.previousElementSibling.className = 
		x.previousElementSibling.className.replace(" w3-green", "");
	}
	}
				
function myFunction4() {
	var x = document.getElementById("demo4");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " w3-green";
	} else { 
		x.className = x.className.replace(" w3-show", "");
		x.previousElementSibling.className = 
		x.previousElementSibling.className.replace(" w3-green", "");
	}
	}
	
function myFunction5() {
	var x = document.getElementById("demo5");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " w3-green";
	} else { 
		x.className = x.className.replace(" w3-show", "");
		x.previousElementSibling.className = 
		x.previousElementSibling.className.replace(" w3-green", "");
	}
	}
	
function createcode(length){
	var result           = '';
	var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	var charactersLength = characters.length;
	for ( var i = 0; i < length; i++ ) {
		result += characters.charAt(Math.floor(Math.random() * charactersLength));
	}
		document.getElementById("code").value = result;
	}
	
function callDate(){
	n =  new Date();
	y = n.getFullYear();
	m = n.getMonth() + 1;
	d = n.getDate();
	h = n.getHours();
	mi = n.getMinutes();
	s = n.getSeconds();
	document.getElementById("date").value = d + "/" + m + "/" + y +" "+ h + ":" + mi + ":" + s;
}

function validationJoinClassName(){
	var checkclassname = document.formjoinclass.classname.value;
	if ( checkclassname == "" ) {
		alert("Please Enter Class Name");
    return false;
	}
    }
	
