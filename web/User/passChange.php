<?php session_start(); ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script src="js/passChange.js"></script>
</head>
<body>
<form action="passChange.php" method="post" id="passChangeform" enctype="multipart/form-data">
    <div class="registration">
    <table>
        <tr>
            <td colspan="3"><h2>Password Change</h2></td>
        </tr>

        <tr>
            <td>New Password</td>
            <td><input type="password" name="passField"></td>
            <td><p id="passError"></p></td>
        </tr>

        <tr>
            <td>Confrim Password</td>
            <td><input type="password" name="cpassField"></td>
            <td><p id="cpassError"></p></td>
        </tr>

        <tr>
            <td align="right" colspan="2">
                <input type="reset">
                <input type="button" onclick="passValidation()" value="Submit">
            </td>
        </tr>

    </table>
    </div>

</form>
<script src="js/passChange.js"></script>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
echo "wwasdas";
    $passValid = false;


///password

    $pass = $_POST['passField'];
    $cpass = $_POST['cpassField'];
    $pass = trim($pass);
    $cpass = trim($cpass);


    if (empty($pass)) {
        echo "You must enter a password";
    } else {

        if (empty($cpass)) {
            echo "Re-enter password";
        } else {
            if ($pass == $cpass) {
                $pass = md5($pass);
                $pass = $pass;
                $passValid = true;
            } else {
                echo "password doesn't match";
            }
        }
    }

    if ($passValid == true) {
        $id=$_SESSION['id'];
        $con = mysqli_connect("localhost", "root", "", "commerce");
        $query="UPDATE user SET pass='$pass' WHERE id='$id'";
        $result = mysqli_query($con, $query);

        if ($result) {
            header("Location:userHome.php");
        }
        else {
            echo "<h1 align='center'>Password Change failed</h1>";
        }
    }
}

?>