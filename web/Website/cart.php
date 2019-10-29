<?php session_start();?>

<?php include_once ("header.php")?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>
<div class="cart">

<!--    showing the items from cart-->

        <table >
            <tr>
                <th>Serial</th>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                    $serial=0;
                    $totalPrice=0;
                    if (isset($_SESSION["cart"])) {
                        foreach ($_SESSION["cart"] as $cart) {

                            if (isset($cart)) {
                                $serial++;
                                ?>
                                <tr>
                                    <td><?php echo $serial ?></td>
                                    <td><?php echo $cart['item_id'] ?></td>
                                    <td><?php echo $cart['item_name'] ?></td>
                                    <td><?php echo $cart['item_price'] ?></td>
                                    <td id="iq"><?php echo $cart['item_quantity'] ?></td>
                                    <td><?php echo $cart['item_price'] * $cart['item_quantity'] ?></td>
                                    <td>
                                        <a href="productDescription.php?pid=<?php echo $cart['item_id'] ?>&visit=<?php echo $cart['item_id'] ?>">Edit</a>
                                    </td>
                                    <td><a href="deleteCart.php?pid=<?php echo $cart['item_id'] ?>">Delete</a></td>

                                    <?php $totalPrice += $cart['item_price'] * $cart['item_quantity'] ?>

                                </tr>
                                <?php
                            }
                        }
                    }

            ?>

            <tr>
                <td colspan="8" align="right"><?php echo "Total: ".$totalPrice."Tk";?></td>
            </tr>

        </table>
   <div  class="checkOutTag"><a href="checkout.html">Payment</a></div>
</div>


<!--if not available after buying by another client-->

<?php
            $serialCount=0;
        if(isset($_SESSION["exceedQuantity"])) {
                      foreach ($_SESSION["exceedQuantity"] as $errorCheck) {
//             echo $errorCheck['name'];
                ?>
<div class="excceedQuantity">
    <h2>Please Edit you cart</h2>
                <table>
                    <tr>
                        <th>Serial</th>
                        <th>Product Name</th>
                        <th>Available Quantity</th>
                    </tr>
                    <tr>
                        <td><?php echo ++$serialCount?></td>
                        <td><?php  echo $errorCheck['name'] ?></td>
                        <td><?php  echo $errorCheck['qQuantity'] ?></td>
                    </tr>
                </table>
</div>
                <?php
            }
                unset($_SESSION['exceedQuantity']);
        }
?>

        <?php include_once ("footer.php");
        ?>


</body>
</html>
