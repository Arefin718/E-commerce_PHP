<?php
session_start();
if(isset($_COOKIE['id'])){
    $_SESSION['id'] = $_COOKIE['id'];
    header('Location: http://localhost/web/website');
}
?>

<?php
if($_SERVER['REQUEST_METHOD']=="POST") {

    $email = trim($_POST['email']);
    $pass = md5(trim($_POST['pass']));
    $rem = $_POST['rem'];

    if (!empty($email) && !empty($pass)) {

        $con = mysqli_connect("localhost", "root", "", "commerce");
        $query = "SELECT * from user where email='$email'";
        $result = mysqli_query($con, $query);
        $user = mysqli_fetch_assoc($result);

        if ($user['email'] == $email && $user['pass'] == $pass) {

            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            $root = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
            header('Location: http://localhost/web/website');

        } else {
            echo "<h1>Login Failed</h1>";
        }

    }
}
?>

<html>
<head>
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
    <style>
        .login{
            width: 100%;
            padding: 180px 0px;
            background-color: seashell;
        }
        .login table{
            margin: 0 auto;
            font-size: 18px;
            font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
            color: black;
        }

        .login table tr td input[type="text"],.login table tr td input[type="password"]{
            height: 40px;
            width: 450px;
            font-size: 18px;
            border: 1px solid blue;
        }

        .login table tr td input[type="submit"]{
            height: 40px;
            width: 80px;
            font-size: 18px;
        }

        .login table tr td{
            padding: 10px 30px;
        }

        .login table tr td a{
            background-color: white;
            padding: 6px 9px;
            border: 1px solid black;
        }
        .login table tr td a:hover{
            color: red;
        }

    </style>
</head>
<body>
<?php include_once ("header.php")?>

<form action="" method="POST">

        <div class="login">
            <table>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <a href="userRegistration.php">Register</a>
                        <input type="submit" value="Log In">
                        <input type="checkbox" name="rem"/> Remember Me<br/>
                    </td>
                </tr>
            </table>
        </div>
</form>

<?php include_once ("footer.php")?>

<!--login verification-->


</body>
</html>