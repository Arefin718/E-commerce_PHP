
var validName=false;
var validPrice=false;
var validBuyingprice=false;
var validDescription=false;
var validQuantity=false;
var category;

function Update(){

    nameValidate();
    buyingpriceValidate();
    priceValidate();
    descriptionValidate();
    quantityValidate();

    if ( (validName==true) && (validPrice==true) && (validBuyingprice==true)&& (validQuantity==true)
        && (validDescription==true)){
        var form = document.getElementById("productEdit");
        form.submit();
    }
}


function nameValidate() {

    var pname = document.getElementById("pname").value;
    if (pname.length == 0) {
        document.getElementById("pnameerror").innerHTML = "name must not be empty";
        document.getElementById("pnameerror").style.color="red";

    }
    else {
        document.getElementById("pnameerror").innerHTML="";
        validName = true;
    }
}
function priceValidate() {
    var price = document.getElementById("price").value;



    if (price.length ==0) {
        document.getElementById("priceerror").style.color="red";
        document.getElementById("priceerror").innerHTML = "price must not be empty";
    }
    else if(!isInteger(price)){

        document.getElementById("priceerror").innerHTML = "Price must be Number or greater then 0";
        document.getElementById("priceerror").style.color="red";
    }
    else {
        document.getElementById("priceerror").innerHTML = "";
        validPrice = true;
    }
}

function isInteger(x) {
    if (x % 1 === 0) {
        if (x > 0) {
            return true;
        }
    }
}

function buyingpriceValidate() {

    var Buyprice = document.getElementById("buyingprice").value;
    var tempPrice = parseInt(Buyprice);

    if (Buyprice.length == 0) {
        document.getElementById("buyingpriceerror").style.color="red";
        document.getElementById("buyingpriceerror").innerHTML = "buying price must not be empty";

    }

    else if(!isInteger(Buyprice)){

        document.getElementById("priceerror").innerHTML = "Price must be Number or greater then 0";
        document.getElementById("priceerror").style.color="red";
    }


    else {
        document.getElementById("buyingpriceerror").innerHTML="";
        validBuyingprice = true;
    }
}

function descriptionValidate(){
    var description = document.getElementById("description").value;

    if (description.length == 0) {
        document.getElementById("descriptionerror").style.color="red";
        document.getElementById("descriptionerror").innerHTML = "description must not be empty";

    }
    else {
        document.getElementById("descriptionerror").innerHTML="";
        validDescription = true;
    }

}

function quantityValidate(){
    var quantity = document.getElementById("quantity").value;

    if (quantity.length == 0) {
        document.getElementById("quantityerror").style.color="red";
        document.getElementById("quantityerror").innerHTML = "quantity must not be empty";

    }

    else if(!isInteger(quantity)){

        document.getElementById("quantityerror").innerHTML = "Quantity must be Number or greater then 0";
        document.getElementById("quantityerror").style.color="red";
    }
    else {
        document.getElementById("quantityerror").innerHTML="";
        validQuantity = true;
    }


}
/*
function imageValidate(){
    var image = document.getElementById("image").value;

    if (image.length == 0) {
        document.getElementById("filerror").style.color="red";
        document.getElementById("fileerror").innerHTML = "image must not be empty";

    }else if(image.split('.').pop()()!='.jpg'){
        document.getElementById("filerror").style.color="red";
        document.getElementById("fileerror").innerHTML = "Select a jpg image";
    }
    else {

        document.getElementById("fileerror").innerHTML="";
        validImage = true;
    }
}
*/

function newCat() {
    var cat=document.getElementById("cat");
    var newTxt=document.getElementById("newText");
    cat.style.visibility="hidden";
    newTxt.style.visibility="visible";
    var newcateButton=document.getElementById("newcate");
    newcateButton.style.visibility="hidden";
}





