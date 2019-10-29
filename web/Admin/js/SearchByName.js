    function searchByName(value){
        if(value.length!=0){
            var obj = new XMLHttpRequest();
            obj.open('GET', 'ajaxSuggestion.php?key='+value, true);
            obj.send();
            obj.onreadystatechange = function(){
                if(obj.readyState==4){
                    var div = document.getElementById("suggestName");
                       div.innerHTML=obj.responseText;
                }
            }
        }
}

    function searchByAdmin(value){
        if(value.length!=0){
            var obj = new XMLHttpRequest();
            obj.open('GET', 'ajaxSuggestionAdmin.php?key='+value, true);
            obj.send();
            obj.onreadystatechange = function(){
                if(obj.readyState==4){
                    var div = document.getElementById("suggestName");
                    div.innerHTML=obj.responseText;
                }
            }
        }
    }
    function searchByProduct(value){
        if(value.length!=0){
            var obj = new XMLHttpRequest();
            obj.open('GET', 'ajaxSuggestionProduct.php?key='+value, true);
            obj.send();
            obj.onreadystatechange = function(){
                if(obj.readyState==4){
                    var div = document.getElementById("suggestName");
                    div.innerHTML=obj.responseText;
                }
            }
        }
    }

function search(name) {
    var from=document.getElementsByTagName("form")[0];
    var sear=document.getElementById("nameToSearch");
    sear.value=name;
    from.submit();
}

function show(name) {
    var sear=document.getElementById("nameToSearch");
    sear.value=name;
}