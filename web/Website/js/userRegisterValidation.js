
var nameValid = false;
var emailValid = false;
var genderValid = false;
var passValid = false;
var addressValid=false;

function validate(){
    nameValidate();
    emailValidate();
    genderValidate();
    passValidate();
    addressValidate();

    if ((nameValid==true) && (emailValid==true) && (genderValid==true) && (passValid==true) && (addressValid==true)){
        var form = document.getElementById("form");
        form.submit();
    }
}

function nameValidate() {
    var name = document.getElementsByName("nameField")[0].value;

    if (name.length == 0) {
        document.getElementById("nameError").innerHTML = "Name field can't be empty";
    }

    else if (name.split(" ").length != 2) {
        document.getElementById("nameError").innerHTML = "Name must contain atleast two words";
    }

    else if (!((name[0] >= 'a' && name[0] <= 'z') || (name[0] >= 'A' && name[0] <= 'Z') )) {
        document.getElementById("nameError").innerHTML = "Name must start with letter";
    }

    else if (nameValidate(name)) {
        document.getElementById("nameError").innerHTML = "Name can contain a-z or A-Z or dot(.) or dash(-)";
    }

    else if (!nameValidate(name)) {
        nameValid = true;
        document.getElementById("nameError").innerHTML = "";
    }


    function nameValidate(str) {
        for (var i = 0; i < str.length; i++) {
            if (!((str[i] >= 'a' && str[i] <= 'z') || (str[i] >= 'A' && str[i] <= 'Z') || str[i] == ' ' || str[i] == '-' || str[i] == '.')) {
                return true;
                break;
            }
        }
    }
}

function emailValidate() {

    var email = document.getElementsByName("emailField")[0].value;

    var em=email.split("@");

    if (email.length==0){
        document.getElementById("emailError").innerHTML="Email field can't be empty";
    }
    else if(!email.includes("@")) {
        document.getElementById("emailError").innerHTML="Invalid Email";
    }
    else if(!(em[1].includes(".com"))){
        document.getElementById("emailError").innerHTML="Invalid Email";
    }
    else{
        emailValid = true;
        document.getElementById("emailError").innerHTML="";
    }

}


function  addressValidate() {
    var address = document.getElementsByName("addressField")[0].value;
    if (address.length ==0 ){
        document.getElementById("addressError").innerHTML="Provide your address";
    }
    else{
        addressValid=true;
    }
}

function genderValidate() {

    var gender = document.getElementsByName("genderField");
    var gen;

    for (var i = 0; i < gender.length; i++) {
        if (gender[i].checked) {
            gen="Gender: "+gender[i].value;
            genderValid=true;
            break;
        }
    }

    if (!genderValid){
        document.getElementById("genderError").innerHTML="Gender not selected";
    }
    else{
        document.getElementById("genderError").innerHTML="";
    }

}

function  passValidate() {
    var pass = document.getElementsByName("passField")[0].value;
    var cpass = document.getElementsByName("cpassField")[0].value;

    if (pass.length == 0){
        document.getElementById("passError").innerHTML="You must enter a password";
    }
    else{
        document.getElementById("passError").innerHTML="";
        document.getElementById("cpassError").innerHTML="";
        if (cpass.length ==0 ){
            document.getElementById("cpassError").innerHTML="Re-enter password";
        }
        else{
            if(pass==cpass){
                passValid=true;
            }
            else{
                document.getElementById("cpassError").innerHTML="password doesn't match";
            }
        }
    }
}
