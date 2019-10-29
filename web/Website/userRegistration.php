<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>

<?php include_once ("header.php")?>
<div class="registration">
<form action="userRegisterValidation.php" method="" id="form">
    <table>
        <tr>
            <td colspan="3"><h2>Registration</h2></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="nameField"></td>
            <td><p id="nameError"></p></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="emailField"></td>
            <td><p id="emailError"></p></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="passField"></td>
            <td><p id="passError"></p></td>
        </tr>

        <tr>
            <td>Confrim Password</td>
            <td><input type="password" name="cpassField"></td>
            <td><p id="cpassError"></p></td>
        </tr>

        <tr>
            <td>Address</td>
            <td><input type="text" name="addressField"></td>
            <td><p id="addressError"></p></td>
        </tr>

        <tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="genderField" value="m"><span>Male</span>
                <input type="radio" name="genderField" value="f"><span>Female</span>
                <input type="radio" name="genderField" value="o"><span>Other</span>
            </td>
            <td><p id="genderError"></p></td>
        </tr>
        <tr>
            <td align="right" colspan="2">
                <input type="reset">
                <input type="button" onclick="validate()" value="Submit">
            </td>
        </tr>

    </table>

</form>
</div>
<?php include_once ("footer.php")?>
    <script src="js/userRegisterValidation.js"></script>
</body>
</html>

