<?php
session_start();
if (isset($_SESSION['id'])) {
    $con = mysqli_connect("localhost", "root", "", "commerce");


//final check before checkout for different client

      $con=mysqli_connect("localhost","root","","commerce");
        $query="SELECT id, name, quantity FROM product"; // select id and quantity
        $idAndQuantity=mysqli_query($con,$query);

        while ($product=mysqli_fetch_assoc($idAndQuantity)) {
            $idnQuan[]=$product;
        }

    $quant=true; //if available after buying by another client

        if (isset($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $cart) {
               foreach ($idnQuan as $product) {
                    if ($cart['item_id'] == $product['id']) {
                        if ($cart['item_quantity'] > $product['quantity']) {
                            $_SESSION['exceedQuantity'][$product['id']]['name']=$product['name'];
                            $_SESSION['exceedQuantity'][$product['id']]['qQuantity']=$product['quantity'];
                            $quant=false;
                        }

                    }
                }
            }
        }

//var_dump($idnQuan[0][0]);






if ($quant==true) {

    if (isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $cart) {
            $itemQuantity = $cart['item_quantity'];
            $itemId = $cart['item_id'];
            $updateQuery = "UPDATE product SET quantity=quantity-$itemQuantity, sold=sold+$itemQuantity  where id='$itemId'";
            $result = mysqli_query($con, $updateQuery);
        }

        $user_id = $_SESSION['id'];

        foreach ($_SESSION["cart"] as $cart) {

            $item_id = $cart['item_id'];
            $item_name = $cart['item_name'];
            $item_quantity = $cart['item_quantity'];
            $item_price = $cart['item_price'];

            $query = "INSERT INTO cart(user_id, item_id, product_name, product_quantity, unit_price, order_time)
    VALUES($user_id, ' $item_id' , '$item_name', '$item_quantity', '$item_price', NOW())";

            $result = mysqli_query($con, $query);

            if (!$result) {
                echo "<h1 align='center'>Order Failed</h1>";
            } else {
                header("Location:index.php");

            }

        }
    }else{
        header("Location:cart.php");
    }

    unset($_SESSION["cart"]);
}
else{
    header("Location:cart.php");
}
}
else{
    header("Location:userLogin.php");
}

?>
