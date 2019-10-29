<?php

    $con=mysqli_connect("localhost","root","","commerce");
    $query1="SELECT * from cart";

    $resul1=mysqli_query($con,$query1);

    while($cart=mysqli_fetch_assoc($resul1)) {

        $order_time=$cart['order_time'];
        $product_id=$cart['item_id'];
        $user_id=$cart['user_id'];
        $product_name=$cart['product_name'];
        $product_quantity=$cart['product_quantity'];
        $unit_price=$cart['unit_price'];

    $query2 = "INSERT INTO delivered(user_id,order_time, delivered_time, product_id, product_name, product_quantity, unit_price) 
    VALUES('$user_id','$order_time', NOW() , '$product_id' ,' $product_name', '$product_quantity', '$unit_price')";
    mysqli_query($con,$query2);
    }

    $userId=$_GET['uid'];
    $query="Delete FROM cart where user_id=$userId";
    mysqli_query($con,$query);
    header("Location:adminHome.php");
?>
