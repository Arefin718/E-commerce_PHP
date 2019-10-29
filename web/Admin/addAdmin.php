<html>
<head>
    <link rel="stylesheet" href="css/register.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>
<div class="registration">
    <form action="addAdmin.php" method="post" id="form" enctype="multipart/form-data">
        <table>
            <tr>
                <td colspan="3"><h2>Admin Registration</h2></td>
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
                <td>Phone</td>
                <td><input type="text" name="phoneField"></td>
                <td><p id="phoneError"></p></td>
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
                <td>Image</td>
                <td>
                    <input type="file" name="imageUpload" value="m">
                </td>
                <td><p id="imageError"></p></td>
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

<script src="js/adminRegisterValidation.js"></script>


<!--php validation-->
<?php

if ($_SERVER['REQUEST_METHOD']=="POST"){

    $nameValid = false;
    $emailValid = false;
    $genderValid = false;
    $passValid = false;
    $phoneValid=false;

//Name Verify


    function nameValidate($str){
        $aName=str_split($str,1);
        foreach ($aName as $char){
            if(!(($char>='a' && $char<='z') || ($char>='A' && $char<='Z') || $char==' ' || $char=='-' || $char=='.')){
                return true;
            }
        }
    }

    $name=$_POST['nameField'];
    $name=trim($name);

    if(empty($name)) {
        echo "Name field is required"."<br/>";
    }

    else if(count(explode(" ",$name))<2) {
        echo "Name must contain at least two words"."<br/>";
    }

    else if(!( ($name[0]>='a' && $name[0]<='z') || ($name[0]>='A' && $name[0]<='Z'))){
        echo "Name must start with letter"."<br/>";
    }

    else if(nameValidate($name)){
        echo "Name can contain a-z or A-Z or dot(.) or dash(-)"."<br/>";
    }

    else{
        $nameValid = true;
        $name=$name;
    }



//Email Verify

    $email=$_POST['emailField'];
    $email=trim($email);


    $em=explode("@",$email);

    if(empty($email)) {
        echo "Email field is required"."<br/>";
    }

    else if(strpos($em[1],".com")==false){
        echo "Invalid Email."."<br/>";
    }
    else{
        $email=$email;
        $emailValid = true;
    }


//Gender Verify


    if (!isset($_POST['genderField'])){
        echo "You must select Gender"."<br/>";
    }
    else if ($_POST['genderField']=='m'){
        $genderValid = true;
        $gender="Male";
    }
    elseif ($_POST['genderField']=='f'){
        $genderValid = true;
        $gender="Female";
    }
    else {
        $genderValid = true;
        $gender="Other";
    }


///password

    $pass=$_POST['passField'];
    $cpass=$_POST['cpassField'];
    $pass=trim($pass);
    $cpass=trim($cpass);



    if (empty($pass)){
        echo "You must enter a password";
    }
    else{

        if (empty($cpass)){
            echo "Re-enter password";
        }
        else{
            if($pass==$cpass){
                $pass=md5($pass);
                $pass=$pass;
                $passValid=true;
            }
            else{
                echo "password doesn't match";
            }
        }
    }

//address


    $address=$_POST['addressField'];
    $address=trim($address);



    if(empty($address)) {
        echo "Please provide your address"."<br/>";
    }
    else{
        $address=$address;
    }

    //phone validate

    $phone=$_POST['phoneField'];

    if (strlen($phone)<11){
        echo "Number can't be less than 11 digit";
    }
    else{
        $phoneValid=true;
    }

//image upload
    var_dump($_FILES);
    //$file = $_POST['imageUpload'];

    //$info = pathinfo($file);
    //if ($info["extension"] == "jpg"){
//    $imageName=$_FILES["imageUpload"]["name"];
//    echo $imageName;
//    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    $target_file = "images/".$_FILES["imageUpload"]["name"];
    $_FILES["imageUpload"]["name"]=$_SESSION['adminId'].".jpg";
    move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file);
    //}


//save in database


    if (($nameValid==true) && ($emailValid==true) && ($genderValid==true) &&
        ($passValid==true) && ($phoneValid==true)) {

        $type = "admin";

        $con = mysqli_connect("localhost", "root", "", "commerce");

        $query="SELECT email FROM admin";
        $result = mysqli_query($con, $query);
        $emailExists=false;
        while ($user=mysqli_fetch_assoc($result)){
            if ($email==$user['email']){
                $emailExists=true;
            }
        }

        if (!$emailExists){

        $query = "INSERT INTO admin(name, email, address, pass, gender, phone, type, image) VALUES('$name', '$email', 
        '$address' ,'$pass', '$gender', '$phone', '$type', '$target_file')";

        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<h1 align='center'>Registration sussessfully</h1>";
        }
        else {
            echo "<h1 align='center'>Registration failed</h1>";
        }

        }
        else{
            echo "<h1 align='center'>Email Already Exists</h1>";
        }

    }
}

?>

</body>
</html>