<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/viewUser.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>
<div class="users">

    <div id="HTMLtoPDF">
    <h1 align="center">All Mails</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>EMAIL</th>
            <th>DESCRIPTION</th>
        </tr>
        <?php


        $serialCount=0;
        $con=mysqli_connect("localhost","root","","commerce");
        $query="SELECT * from mail";
        $userResult=mysqli_query($con,$query);
        while ($mail=mysqli_fetch_assoc($userResult)){  ?>

            <tr>
                <td><?php echo $mail['userId']?></td>
                <td><?php echo $mail['mail']?></td>
                <td><?php echo $mail['description']?></td>
            </tr>


        <?php }?>
    </table>

    </table>
        <center> <a href="#" onclick="HTMLtoPDF()">Download PDF</a> </center>
    </div>
</div>
</body>
</html>