<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/searchByCategory.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>
<?php include_once ("header.php")?>

<div class="searchByCategory">

    <?php
    $cat=$_GET['catago'];
    $con=mysqli_connect("localhost","root","","commerce");
    ?>

    <table>
        <tr>
            <td colspan="5"><a href="searchByCategory.php?catago=<?php echo $cat ?>">
                    <h1><?php echo strtoupper($cat) ?></h1></a></td>
        </tr>
        <tr>

            <?php
            $query = "SELECT * FROM product where category='$cat'";
            $result = mysqli_query($con, $query);
            $noofproduct = 0;
            while ($product = mysqli_fetch_assoc($result)) {

                if ($noofproduct % 4==0) {
                    echo "<tr></tr>";
                }
                ?>

                <td>
                    <table>
                        <?php    $noofproduct++; ?>
                        <tr>
                        <tr> <td><a href="productDescription.php?pid=<?php echo $product['id'] ?>"><img height="150" width="150" src="<?php echo $product['image'] ?>"></a></td></tr>
                        </td>
                        </tr>
                        <tr>
                            <td><?php echo  $product['name']  ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "Price: " . $product['price'] . " tk" ?></td>
                        </tr>
                    </table>
                </td>

                <?php

            } ?>

        </tr>

    </table>



</div>

<?php include_once ("footer.php")?>
</body>
</html>