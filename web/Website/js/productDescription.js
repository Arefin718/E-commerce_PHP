availOrNotProduct();

function availOrNotProduct() {

    var aQuantity = document.getElementsByName("hidden_quantity")[0].value;
    var availOrNot = document.getElementById("productAvailability");
    var quantityClass = document.getElementsByClassName("quantity")[0];
    if (aQuantity<1){
        availOrNot.innerHTML = "Out Of Stock";
        availOrNot.style.color = "red";
        quantityClass.style.display="none";
        return false;
    }
    else{
        return true;
    }

}

function addToCart() {

    var form = document.getElementById("form");

    if (availability()){
        document.getElementById("notification").innerHTML = "Item added to cart";

        setTimeout(function(){
            form.submit();;
        }, 500);

    }

    setTimeout(function(){
        document.getElementById("notification").innerHTML = '';
    }, 500);

}

function availability() {
    var quantity = document.getElementsByName("quantity")[0].value;
    var availability = document.getElementById("availability");
    var aQuantity = document.getElementsByName("hidden_quantity")[0].value;



    if (!isInteger(quantity)) {
        availability.innerHTML = "Invalid Quantity";
    }
    else {
        var quantity=parseInt(quantity);
        if (quantity<=aQuantity) {
            availability.innerHTML = "";
            return true;
        }
        else {
            availability.innerHTML = "Item left: " + aQuantity;
            return false;
        }
    }


    function isInteger(x) {
        if (x % 1 === 0) {
            if (x > 0) {
                return true;
            }
        }
    }
}
