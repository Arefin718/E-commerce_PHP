<?php session_start(); ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/wishlist.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>

<body>
<?php include_once ("header.php")?>

<div class="wishlist">
    <?php

    if (isset($_SESSION['id'])) {
        if (isset($_GET['pid'])){

            $id = $_GET['pid'];
            $userId=$_SESSION['id'];
            $productExists=false;
            $wishlist = simplexml_load_file("file/wishlist.xml");

            foreach ($wishlist->children() as $child) {
                if ($id==$child->productId){
                    $productExists=true;
                }
            }

            if (!$productExists) {

                $con = mysqli_connect("localhost", "root", "", "commerce");
                $query = "SELECT name, price FROM product WHERE id='$id'";
                $result = mysqli_query($con, $query);

                while ($product = mysqli_fetch_assoc($result)) {
                    $name = $product['name'];
                    $price = $product['price'];
                }

                if (isset($wishlist->user)) {
                    $length = sizeof($wishlist->user); //NO need to add +1
                } else {
                    $length = 0;
                }

                $x = $length;

                $wishlist->addChild("user", "");
                $wishlist->user[$x]->addAttribute("id", $userId);
                $wishlist->user[$x]->addChild("productId", $id);
                $wishlist->user[$x]->addChild("productName", $name);
                $wishlist->user[$x]->addChild("price", $price);

                $wishlist->asXML("file/wishlist.xml");

                header("Location:productDescription.php?pid=$id");

            }
            else{
                header("Location:productDescription.php?pid=$id");
            }

        }

        else{
            ?>

            <table>
                <tr>
                    <th>Serial</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Add to Card</th>
                    <th>Delete</th>
                </tr>
                <?php
                $wishlist = simplexml_load_file("file/wishlist.xml");
                $serial=0;
                foreach ($wishlist->children() as $user) {
                    if ($user['id']==$_SESSION['id']){
                        echo "<tr>";
                        echo "<td>" . ++$serial . "</td>";
                        echo "<td>" . $user->productId . "</td>";
                        echo "<td>" . $user->productName . "</td>";
                        echo "<td>" . $user->price . "</td>";
                        echo "<td>" . "<a href='productDescription.php?pid=$user->productId'>Add</a>" . "</td>";
                        echo "<td>" . "<a href='deleteFromWishlist.php?pid=$user->productId'>Delete</a>" . "</td>";
                        echo "</tr>";
                    }}
                ?>
            </table>

        <?php }
    }
    else{
        header("Location:userLogin.php");
    }?>


</div>
<?php include_once ("footer.php")?>
</body>
</html>