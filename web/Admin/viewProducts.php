<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/viewUser.css">
</head>
</html>

<body>
<script>

</script>
<div class="users">
    <h1>Product Name</h1>


    <div class="Search">

        <form method="post" action="viewProducts.php">
            <table cellspacing="0" cellpadding="0" >
              <td>  <input id="nameToSearch" type="text" name="productName" size="80" onkeyup="searchByProduct(this.value);">
                <div id="suggestion">
                    <ul id="suggestName">

                    </ul>
                </div>
                <input type="submit" value="SEARCH">
              </td>
            </table>
        </form>

        <form method="post" action="viewProducts.php">
            <span>Sort By:</span>

            <select name="sort" >
                <option  value="id">Id</option>
                <option  value="name">Name</option>

            </select>
            <input type="submit" name="submit" value="GO">


        </form>


    </div>


    <table cellpadding="0" cellspacing="0">
        <tr id="heading">
            <th>SL</th>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        error_reporting(0);

        // if($_SERVER['REQUEST_METHOD'] == 'POST'){



        $serialCount=0;
        $userName="" ;
        $userName=$_POST["productName"];
        $userQuery = "SELECT * FROM product";
        if($userName=="") {
            $userQuery = "SELECT * FROM product ";
        }
        if (!$userName == "") {
            $userQuery = "SELECT * FROM product WHERE name LIKE '%$userName%'";
        }

        if($_POST["sort"]=="name"){
            $userQuery = "SELECT * FROM product ORDER BY name";
        }
        if($_POST["sort"]=="id"){
            $userQuery = "SELECT * FROM product ORDER BY id";
        }

        $con=mysqli_connect("localhost","root","","commerce");
        $userResult=mysqli_query($con,$userQuery);
        while ($product=mysqli_fetch_assoc($userResult)){  ?>

            <tr>
                <td><?php echo ++$serialCount ?></td>
                <td><?php echo $product['id']?></td>
                <td><?php echo $product['name']?></td>
                <td><?php echo $product['price']?></td>
                <td><?php echo $product['quantity']?></td>
                <td><a href="productEdit.php?pid=<?php echo $product["id"] ?>"> Edit</a></td>
                <td><a href="delete.php?pid=<?php echo $product["id"] ?>"> Delete</a></td>
            </tr>



        <?php }?>
    </table>

</div>
<script src="js/SearchByName.js"></script>

</body>
