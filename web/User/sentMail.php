<html>

<head>

</head>

<body>
    <center>

        <form action="sentMail.php" method="post" id="form">
        <table cellspacing="25">
            <tr>
                <td>Description:*</td>
                <td><textarea rows="10" cols="50" name="des" id="des"></textarea></td>
                <td><p hidden id="error"></p></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Sent" ">
                </td>
            </tr>
        </table>
        </form>

    </center>
</body>



</html>


<?php
session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $des = $_POST['des'];

        $con=mysqli_connect("localhost","root","","commerce");
        $query="SELECT name FROM user where id='$_SESSION[id]'";
        $result=mysqli_query($con,$query);

        $userId = $_SESSION['id'];
        $userEmail = $_SESSION['email'];


        $sql = "INSERT INTO `mail`(`userId`, `mail`, `description`) VALUES ('$userId','$userEmail','$des')";
        mysqli_query($con,$sql);

        header('Location: http://localhost/web/user/userHome.php');
    }

?>