var passValid = false;


function passValidation(){
    passValidate();

    if (passValid==true){
        var form = document.getElementById("passChangeform");
        form.submit();
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


