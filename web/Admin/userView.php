<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/viewUser.css">
</head>
</html>

<body>
<script>

</script>
<div class="users">
<h1>User</h1>


<div class="Search">

    <form method="post" action="userView.php">
        <table cellspacing="0" cellpadding="0" >
      <td>  <input id="nameToSearch" type="text" name="userName" size="80" onkeyup="searchByName(this.value);">
        <div id="suggestion">
            <ul id="suggestName">

            </ul>
        </div>
        <input type="submit" value="SEARCH">
      </td>
        </table>
    </form>

    <form method="post" action="userView.php">
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
        <th>Name</th>
        <th>Id</th>
        <th>Email</th>
        <th>Delete</th>
    </tr>

    <?php
    error_reporting(0);

   // if($_SERVER['REQUEST_METHOD'] == 'POST'){



        $serialCount=0;
        $userName="" ;
        $userName=$_POST["userName"];
        $userQuery = "SELECT name, id, email FROM user";
    if($userName=="") {
        $userQuery = "SELECT * FROM user ";
    }
        if (!$userName == "") {
                $userQuery = "SELECT name, id, email FROM user WHERE name LIKE '%$userName%'";
            }

    if($_POST["sort"]=="name"){
        $userQuery = "SELECT * FROM user ORDER BY name";
    }
    if($_POST["sort"]=="id"){
        $userQuery = "SELECT * FROM user ORDER BY id";
    }

        $con=mysqli_connect("localhost","root","","commerce");
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
<script src="js/SearchByName.js"></script>

</body>
