
var imageUpload =false;

function ppValidation(){

    imageUploadValidation();

    if (imageUpload == true){
        var form = document.getElementById("ppChangeform");
        form.submit();
    }
}


function imageUploadValidation(){
    var file = document.getElementsByName("imageUpload")[0].value;
    if (file.length==0){
        document.getElementById("imageError").innerHTML="Choose an image";
        document.getElementById("imageError").style.color="red";
    }else if(file.split('.').pop() != "jpg"){
        document.getElementById("imageError").innerHTML="Choose a jpg file";
    }
    else{
        document.getElementById("imageError").innerHTML="";
        imageUpload =true;
    }
}

