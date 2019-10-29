<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/viewUser.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>
    <div class="users">
        <h1>Delivered Product</h1>
        <table cellpadding="0" cellspacing="0">
            <tr id="heading">
                <th>SL</th>
                <th>User ID</th>
                <th>Product Name</th>
                <th>Unit sold</th>
                <th>Order Time</th>
                <th>Delivered Time</th>
            </tr>

            <?php
            $serialCount=0;
            $con=mysqli_connect("localhost","root","","commerce");
            $query="SELECT * FROM delivered";
            $result=mysqli_query($con,$query);
            while ($product=mysqli_fetch_assoc($result)){  ?>

                <tr>
                    <td><?php echo ++$serialCount ?></td>
                    <td><?php echo $product['user_id']?></td>
                    <td><?php echo $product['product_name']?></td>
                    <td><?php echo $product['product_quantity']?></td>
                    <td><?php echo $product['order_time']?></td>
                    <td><?php echo $product['delivered_time']?></td>
                </tr>


            <?php }?>
        </table>
    </div>
</body>
</html>