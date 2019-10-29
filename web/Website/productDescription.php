<?php
session_start();

if (isset($_GET['visit'])){
    $id=$_GET['visit'];
    $_SESSION["cart"][$id]['item_quantity']=0;
}
if ($_SERVER['REQUEST_METHOD']=="POST"){

//if item already exixts or not

    $itemExists=false;

    function checkCartForItem($itemId)
    {
        foreach ($_SESSION["cart"] as $cart) {
            if (isset($cart)) {
                if ((string)$cart['item_id'] == $itemId) {
                    $_SESSION["cart"][$itemId]['item_quantity'] += $_POST["quantity"];
                    return true;
                    break;
                }
            }
        }
    }


    ///checking iteme exists or not

if (isset($_SESSION["cart"])){
    $itemExists = checkCartForItem($_POST["hidden_id"]);
}

//if item doesn't exist then add new

    if ($itemExists==false){

        $itemArray=array(

            'item_id'=>$_POST['hidden_id'],
            'item_name'=>$_POST['hidden_name'],
            'item_price'=>$_POST['hidden_price'],
            'item_quantity'=>$_POST['quantity'],
        );

        $_SESSION["cart"][$_POST['hidden_id']]=$itemArray;


    }
        if (isset($_GET['visit'])){
            header("Location:cart.php");
        }

}

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/productDescription.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>

    <body>

<?php include_once("header.php"); ?>

<div class="productDescription">

    <?php

    $id=$_GET['pid'];
    $con = mysqli_connect("localhost", "root", "", "commerce");

    $query = "SELECT * FROM product WHERE id=$id";
    $result=mysqli_query($con,$query);

    while ($product=mysqli_fetch_assoc($result)) {
        ?>

        <table>

            <tr>
                <td>
                    <img src="<?php echo $product['image'] ?>">
                </td>

                <td class="priceDescription">
                    <h3><?php echo $product['name'] ?></h3>
                    <h2><?php echo "Price: ".$product['price']." tk"?></h2>
                    <p><?php echo $product['description'] ?></p>
                </td>
                         <td class="quantity">
                   <h1 id="quantityTag">Quantity</h1>

                    <form action="" method="POST" id="form">
                        <input type="text" name="quantity" onclick="value=null" onkeyup="availability()">
                        <p id="availability"></p>
                        <input type="hidden" name="hidden_id" value="<?php echo $product['id'] ?>">


                        <?php
                        if (isset($_SESSION["cart"][$id]['item_quantity'])){
                            $product['quantity']=$product['quantity']-$_SESSION["cart"][$id]['item_quantity'];
                        }
                        ?>

                        <input type="hidden" name="hidden_quantity" value="<?php echo $product['quantity']?>">
                        <input type="hidden" name="hidden_name" value="<?php echo $product['name'] ?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $product['price'] ?>">
                        <input type="button" value="Add to Cart" onclick="addToCart()">
                    </form>


                <a title="Add to wishlist" href="wishlist.php?pid=<?php echo $id?>"><img style="height: 30px; width: 30px; margin-top: 120px" src="images/others/wishlist.png"></a>


                </td>
                <td>
                    <p id="notification"></p>
                    <p id="productAvailability">In Stock</p>
                </td>

            </tr>

        </table>
    <?php } ?>

</div>

<?php include_once("footer.php");?>

    <script src="js/productDescription.js"></script>


  </body>
</head>
</html>

