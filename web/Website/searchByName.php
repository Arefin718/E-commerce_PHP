<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/searchByName.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>

<?php include_once("header.php")?>

<div class="searchByName">

<?php

       $name=$_GET['productname'];

       if(empty($name)){
           header("Location:index.php");
       }

        $con = mysqli_connect("localhost", "root", "", "commerce");
        $query = "SELECT * FROM product WHERE name like '%$name%'";
        $result=mysqli_query($con,$query);

        ?>
    <table>
    <tr>


     <?php

    $noofproduct=0;
     while ($product=mysqli_fetch_assoc($result)){

    if($noofproduct%4==0){
        echo "<tr></tr>";
    }
        ?>

        <td>
            <table>
                <?php   $noofproduct++; ?>
                <tr> <td><a href="productDescription.php?pid=<?php echo $product['id'] ?>"><img height="150" width="150" src="<?php echo $product['image'] ?>"></a></td></tr>
                <tr><td><?php echo $product['name'] ?></td></tr>
                <tr><td><?php echo "Price ".$product['price']." tk" ?></td></tr>
            </table>
        </td>

    <?php } ?>

    </tr>

</table>
</div>


<?php include_once("footer.php")?>
</body>
</html>