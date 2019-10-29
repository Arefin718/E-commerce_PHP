<?php session_start(); ?>
<html>
<head>
    <!--<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>-->
    <script src="js/report.js"></script>
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>

</head>
<body>

<?php if (isset($_SESSION['adminId'])) { ?>

<div class="report">
    <?php

    $con=mysqli_connect("localhost","root","","commerce");
    $query="SELECT product_id, product_quantity, unit_price  FROM delivered";
    $totalBuyingPrice=0;
    $totalSellingPrice=0;
    $totalProductSold=0;
    $result=mysqli_query($con,$query);

    while ($delivered=mysqli_fetch_assoc($result)) {
        $priceSell=$delivered['product_quantity']*$delivered['unit_price'];
        $totalSellingPrice+=$priceSell;
        $totalProductSold+=$delivered['product_quantity'];
        $productId=$delivered['product_id'];

        $query2="SELECT buying_price FROM product where id='$productId'";
        $result2=mysqli_query($con,$query2);
        while ($product=mysqli_fetch_assoc($result2)){
            $priceBuy=$delivered['product_quantity']*$product['buying_price'];
            $totalBuyingPrice+=$priceBuy;
        }

    }
    ?>

    <input type="hidden" name="buyPrice" value="<?php echo $totalBuyingPrice ?>">
    <input type="hidden" name="sellPrice" value="<?php echo $totalSellingPrice ?>">

    <h1 align='center'>Report Based on Sold Product</h1>
    <h1 align='center'>Total Sold: <?php echo $totalProductSold." items"?> </h1>
    <h1 align='center'>Buying Price: <?php echo $totalBuyingPrice." TK"?> </h1>
    <h1 align='center'>Selling: <?php echo $totalSellingPrice." TK"?> </h1>

    <div id="myDiv" style="width: 480px; height: 400px; margin: 0 auto">

</div>
    <?php }else{
        header("Location:index.php");
    } ?>

<script>
    var buy=document.getElementsByName("buyPrice")[0].value;
    var sell=document.getElementsByName("sellPrice")[0].value;

    var data = [{
        x: ['Buy', 'Sell'],
        y: [buy, sell],
        type: 'bar'
    }];

    Plotly.newPlot('myDiv', data);
</script>
</body>
</html>