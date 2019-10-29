
function request(requestPage){
    var obj = new XMLHttpRequest();


    obj.open('GET', requestPage, true);
    obj.send();

    obj.onreadystatechange = function(){
        if(obj.readyState==4){
            var display = document.getElementById("display");
            display.innerHTML = obj.responseText;
        }

    }

}
