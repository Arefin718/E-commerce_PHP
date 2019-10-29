<html>
<head>
        <link rel="stylesheet" href="css/orderDetails.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>
<div class="oderDetails" >
    <div  id="HTMLtoPDF">

    <?php
    $userId=$_GET['userid'];
    $con=mysqli_connect("localhost","root","","commerce");
    $userQuery="SELECT name,address FROM user WHERE id=$userId";
    $userResult=mysqli_query($con,$userQuery);
    while ($user=mysqli_fetch_assoc($userResult)){  ?>

            <p><b>Customer Name:</b> <?php echo $user['name']  ?></p>
            <p><b>Customer Address:</b> <?php echo $user['address'] ?></p>
            <h2>Order list</h2>

   <?php } ?>
    <table>
        <tr>
            <th>Serial No</th>
            <th>Product Name</th>
            <th>Ordered Time</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
        </tr>

        <?php

        $query="SELECT * FROM cart WHERE user_id=$userId";
        $result=mysqli_query($con,$query);  // fetching data from by id from cart

        $serial=0;
        $subtotal=0;

        while ($cart=mysqli_fetch_assoc($result)){
            $serial++;
            ?>

        <tr>
            <td><?php echo $serial ?></td>
            <td><?php echo $cart['product_name'] ?></td>
            <td><?php echo $cart['order_time'] ?></td>
            <td><?php echo $cart['product_quantity'] ?></td>
            <td><?php echo $cart['unit_price'] ?></td>
             <td><?php echo $cart['product_quantity']* $cart['unit_price']?></td>
          <?php  $subtotal+=$cart['product_quantity']* $cart['unit_price']; ?>
        </tr>

 <?php  } ?>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="1" align="right"  bgcolor="black" style="color: white"><b>Subtotal</b></td>
            <td colspan="1" align="right"  bgcolor="black" style="color: white"><?php echo $subtotal?></td>
        </tr>
    </table>
    </div>

    <h4 align="center"><a href="markAsDelivered.php?uid=<?php echo  $userId?>">Mark As Delivered</a></h4>
    <p align="center"><a href="#" onclick="HTMLtoPDF()">Download PDF</a></p>


</div>


</body>
</html>