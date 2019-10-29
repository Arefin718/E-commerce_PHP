<?php session_start();
if(isset($_COOKIE['email'])){
    $mail=$_COOKIE['email'];
    $con=mysqli_connect("localhost","root","","commerce");
    $query="SELECT id, name FROM admin where email='$mail'";
    $result=mysqli_query($con,$query);


    while ($admin=mysqli_fetch_assoc($result)) {

        $_SESSION['adminId']=$admin['id'];
        $_SESSION['adminEmail']=$admin['email'];
    }

    header("Location:adminHome.php");
}
?>
<html>
<head>
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
    <style>

        body{
            background-color: antiquewhite;
        }

        .login table{
            margin: 0 auto;
            font-size: 25px;
            padding-top: 200px;
        }
        .login table tr td{
            padding: 10px 10px;
        }
        .login table input[type="text"],.login table input[type="password"]{
            height: 30px;
            width: 400px;
        }
        .login table input[type="submit"]{
            height: 35px;
            width: 80px;
            font-size: 19px;
        }
        .login p{
            font-size: 20px;
            color: red;
        }
    </style>

</head>
<body>
<div class="login">
    <form action="" method="post">
        <table>
            <tr>
                <td>Email</td>
                <td><input type="text" name="emailField"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="passField"></td>
            </tr>

            <tr>
                <td colspan="2"  align="right"><input type="checkbox" name="rem"/>Remember  me</td>
            </tr>

            <tr>
                <td colspan="2" align="right"><input type="submit" value="Log in"></td>
            </tr>
        </table>
    </form>


<?php

if ($_SERVER['REQUEST_METHOD']=="POST"){
    $email=trim($_POST['emailField']);
    $pass=trim($_POST['passField']);
    $pass=md5($pass);

    if (!empty($email) && !empty($pass)){



    $con=mysqli_connect("localhost","root","","commerce");
    $query="SELECT id, email, pass, image, name FROM admin where email='$email'";
    $result=mysqli_query($con,$query);

    while ($admin=mysqli_fetch_assoc($result)) {

        if (($email==$admin['email']) && ($pass==$admin['pass'])){

            if(isset($rem)){
                setcookie('email', $email, time()+20);
            }

            $_SESSION['adminId']=$admin['id'];
            $_SESSION['adminEmail']=$admin['email'];
            header("Location:adminHome.php");
        }
        else{
            echo "<p align='center'>Invalid Email or Password</p>";
        }
    }

    }
    else{
        echo "<p align='center'>Fields can't be empty</p>";
    }
}

?>
</div>
</body>
</html>