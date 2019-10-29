<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/allCategories.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>

<?php include_once ("header.php")?>
<!--showing items-->
<div class="allCaetegories">

<?php
$con=mysqli_connect("localhost","root","","commerce");
$uquery="SELECT DISTINCT(category) FROM product"; // for selecting category as unique

$uresult=mysqli_query($con,$uquery);   // storing result for unique category
while ($pro=mysqli_fetch_assoc($uresult)) {
    $cat=$pro['category'];
    ?>
    <table>
        <tr>
            <td colspan="5"><a href="searchByCategory.php?catago=<?php echo $cat?>"><h1><?php echo strtoupper($cat) ?></h1></a></td>
        </tr>
        <tr>

            <?php
            $query="SELECT * FROM product where category='$cat'";
            $result=mysqli_query($con,$query);
            $i=0;
            while ($product=mysqli_fetch_assoc($result)){
                $i++;
                if($i<5){
                    ?>

                    <td>
                        <table>
                            <tr> <td><a href="productDescription.php?pid=<?php echo $product['id'] ?>"><img height="150" width="150" src="<?php echo $product['image'] ?>"></a></td></tr>
                            <tr><td><?php echo $product['name'] ?></td></tr>
                            <tr><td><?php echo "Price: ".$product['price']." tk" ?></td></tr>
                        </table>
                    </td>

                <?php }} ?>

        </tr>

    </table>
<?php } ?>

</div>

<?php include_once ("footer.php")?>

</body>
</html>



