<html>
<head>
    <link rel="stylesheet" href="css/header.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
</html>

<body>
<script>

</script>

<?php error_reporting(0);
include_once ("social.php")?>
<?php include_once ("backToTop.php")?>
<?php session_start() ?>

<div class="menubar">

    <a href="index.php" id="logo"><img src="images/others/logo.png"></a>
<form method="get" action="searchbyname.php">
    <input id="nameToSearch" type="text" name="productname" size="80" onkeyup="searchByName(this.value);">
    <div id="suggestion">
        <ul id="suggestName">

        </ul>
    </div>
    <input type="submit" value="SEARCH">
</form>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="allCategories.php">All categories</a></li>
        <li><a href="searchByCategory.php?catago=clothing">Clothing</a>
            <ul>
                <li><a href="#">T shirt</a></li>
                <li><a href="#">Shoe</a></li>
                <li><a href="#">Sunglass</a></li>
                <li><a href="#">Shirt</a></li>
            </ul>

        </li>

        <li><a href="#">KIDS</a></li>
        <li><a href="searchByCategory.php?catago=electronics">Electronics</a>
            <ul>
                <li><a href="#">SmartPhone</a></li>
                <li><a href="#">TV</a></li>
                <li><a href="#">Monitor</a></li>
                <li><a href="#">Speaker</a></li>
                <li><a href="#">Charger</a></li>
            </ul>
        </li>


            <script>
//            if (document.cookie!="undefined"){
//                alert("cookied");
//            }
//                var sign=document.getElementById("sign");
//                sign.innerHTML=userName;
            </script>

        <li><a href="<?php
                if(!isset($_SESSION['name'])){
                    echo "userLogin.php";
                }else {
                    echo "http://localhost/web/User/userHome.php";
                }

            ?>" id="sign">
                <?php
                    if(!isset($_SESSION['name'])){
                        echo "SIGN IN";
                    }else {
                        echo $_SESSION['name'];
                    }

                ?>
            </a></li>
        <li><a href="cart.php"><img id="cart" src="images/others/cart.png"></a></li>
        <li><a href="wishlist.php"><img id="wishlist" height="20" src="images/others/wishlist.png"></a></li>
    </ul>
</div>


<script src="js/SearchByName.js"></script>

</body>
