<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/suggestions.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>

<div class="outOfStock">
<h1 align="center" style="color: red">These product are going out of stock</h1>
    <table>
        <tr>
            <th>SL</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Quantity</th>
        </tr>
        <?php
                $con=mysqli_connect("localhost","root","","commerce");
                $query="SELECT id, name, quantity FROM product WHERE quantity<6";
                $result=mysqli_query($con,$query);
                $serial=0;
                while ($product=mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo ++$serial?></td>
            <td><?php echo $product['id']?></td>
            <td><?php echo $product['name']?></td>
            <td><?php echo $product['quantity']?></td>
        </tr>


       <?php } ?>
    </table>

</div>

<div class="mostSold">
    <h1 align="center">Most sold Products</h1>
    <table>
        <tr>
            <th>SL</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Quantity Sold</th>
        </tr>
        <?php
        $con=mysqli_connect("localhost","root","","commerce");
        $query="SELECT  id,name,sold FROM product ORDER BY sold DESC LIMIT 5";
        $result=mysqli_query($con,$query);
        $serial=0;
        while ($product=mysqli_fetch_assoc($result)){
            if ($product['sold']!=0){
            ?>
            <tr>
                <td><?php echo ++$serial?></td>
                <td><?php echo $product['id']?></td>
                <td><?php echo $product['name']?></td>
                <td><?php echo $product['sold']?></td>
            </tr>


        <?php }} ?>
    </table>

</div>



</body>
</html>
