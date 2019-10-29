<?php session_start(); ?>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="css/profile.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>
<div class="profile">
    <?php
    $id= $_SESSION['adminId'];
    $con=mysqli_connect("localhost","root","","commerce");
    $query="SELECT * FROM admin where id='$id'";
    $result=mysqli_query($con,$query);

    while ($admin=mysqli_fetch_assoc($result)) { ?>

    <table>
        <tr>
            <td colspan="2"> <h1>Profile</h1></td>
        </tr>
        <tr>
            <td colspan="2">
                <img src="<?php echo $admin['image']?>">
            </td>
        </tr>
        <tr>
            <td>ID:</td>
            <td><?php echo $admin['id']?></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><?php echo $admin['name']?></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><?php echo $admin['gender']?></td>
        </tr>
        <tr>
            <td>Role:</td>
            <td><?php echo ucfirst($admin['type'])?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo $admin['email']?></td>
        </tr>
        <tr>
            <td>Phone No:</td>
            <td><?php echo $admin['phone']?></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><?php echo $admin['address']?></td>
        </tr>
    </table>
    <?php }?>

</div>
<script src="js/request.js"></script>
</body>
</html>