<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/viewUser.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>
<div class="users">
    <h1>Users</h1>

    <div class="search">
        <table cellspacing="0" cellpadding="0">


            <tr>
                <td><input type="text"> <input type="button" value="Search"></td>
                <td><span>Sort By:</span>

                    <select>
                        <option>Name</option>
                        <option>Id</option>
                        <option>Email</option>
                    </select>
                    <input type="button" value="GO">
                </td>
            </tr>
        </table>
    </div>

<table cellpadding="0" cellspacing="0">
    <tr id="heading">
        <th>SL</th>
        <th>Name</th>
        <th>Id</th>
        <th>Email</th>
        <th>Delete</th>
    </tr>

    <?php
    $serialCount=0;
    $con=mysqli_connect("localhost","root","","commerce");
    $userQuery="SELECT name, id, email FROM user";
    $userResult=mysqli_query($con,$userQuery);
    while ($user=mysqli_fetch_assoc($userResult)){  ?>

    <tr>
        <td><?php echo ++$serialCount ?></td>
        <td><?php echo $user['name']?></td>
        <td><?php echo $user['id']?></td>
        <td><?php echo $user['email']?></td>
        <td><?php echo "Delete"?></td>
    </tr>


    <?php }?>
</table>
</div>
</body>
</html>