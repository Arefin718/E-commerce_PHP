<html>
<head>
    <link rel="stylesheet" href="css/order.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>
<div class="order">
    <h2 align="center">Ordered Product</h2>
    <table>
        <tr>
            <th>Serial NO</th>
            <th>User Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Details</th>
        </tr>

    <?php
    $con=mysqli_connect("localhost","root","","commerce");
    $uquery="SELECT  DISTINCT(user_id) FROM cart";

    $uresult=mysqli_query($con,$uquery);   // storing result for unique id

    $serial=0;
    while ($uid=mysqli_fetch_assoc($uresult)) {  //getting unique user id
        $userId = $uid['user_id'];
        $userin="SELECT * FROM user WHERE id=$userId";
        $userInfo=mysqli_query($con,$userin);
        while ($user=mysqli_fetch_assoc($userInfo)){
            $serial++;
            ?>

        <tr>
            <td><?php echo $serial ?></td>
            <td><?php echo $user['id'] ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['address'] ?></td>
            <td><input type="button" style="background-color: transparent; font-size: 18px" value="Details"
                       id="orderDetails.php?userid=<?php echo $user['id'] ?>" onclick="request(this.id)">
            </td>
        </tr>

        <?php
        }
        }

        ?>

    </table>

</div>

<script src="js/request.js"></script>
</body>
</html>