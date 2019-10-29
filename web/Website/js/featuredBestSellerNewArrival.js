
    function request(cat){
        var obj = new XMLHttpRequest();
        //alert(obj.readyState);
        obj.open('GET', 'featuredBestSellerNewArrival.php?type='+cat, true);
        obj.send();
        //alert(obj.readyState);
        obj.onreadystatechange = function(){
            if(obj.readyState==4){
                var pp=document.getElementById("pp");
                pp.innerHTML=obj.responseText;
            }

        }

    }

request('clothing');
