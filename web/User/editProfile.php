<?php session_start(); ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/register.css">

</head>
<body>
        <div class="registration">
            <form action="editProfile.php"  method="post" id="form">
                <?php
                $id= $_SESSION['id'];
                $con=mysqli_connect("localhost","root","","commerce");
                $query="SELECT * FROM user where id='$id'";
                $result=mysqli_query($con,$query);

                while ($admin=mysqli_fetch_assoc($result)) { ?>
                <table>
                    <tr>
                        <td colspan="3"><h2>Edit Profile</h2></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="nameField" value="<?php echo $admin['name']?>"></td>
                        <td><p id="nameError"></p></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="emailField" value="<?php echo $admin['email']?>"></td>
                        <td><p id="emailError"></p></td>
                    </tr>
                    <tr>

                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="addressField" value="<?php echo $admin['address']?>"></td>
                        <td><p id="addressError"></p></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <?php $gender=$admin['gender'] ?>
                            <input type="radio" name="genderField" value="m" <?php echo ($gender=='Male')?'checked':'' ?>><span>Male</span>
                            <input type="radio" name="genderField" value="f" <?php echo ($gender=='Female')?'checked':'' ?>><span>Female</span>
                            <input type="radio" name="genderField" value="o" <?php echo ($gender=='Other')?'checked':'' ?>><span>Other</span>
                        </td>
                        <td><p id="genderError"></p></td>
                    </tr>

                    <tr>
                        <td align="right" colspan="2">
                            <input type="reset">
                            <input type="button" onclick="editProfile()" value="Submit">
                        </td>
                    </tr>

                </table>
                    <?php } ?>
            </form>
        </div>

    <script src="js/editProfile.js"></script>

</body>
</html>

<?php



if ($_SERVER['REQUEST_METHOD']=="POST"){

    $nameValid = false;
    $emailValid = false;
    $genderValid = false;

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


//address


    $address=$_POST['addressField'];
    $address=trim($address);


    if(empty($address)) {
        echo "Please provide your address"."<br/>";
    }
    else{
        $address=$address;
    }


    if (($nameValid==true) && ($emailValid==true) && ($genderValid==true) ) {

        $con = mysqli_connect("localhost", "root", "", "commerce");

        $query="SELECT email FROM user";
        $result = mysqli_query($con, $query);
        $emailExists=false;

        while ($user=mysqli_fetch_assoc($result)){
          if (isset($_SESSION['email'])){
              if ($_SESSION['email']!=$user['email']){
                    if ($email==$user['email']){
                        $emailExists=true;
                    }
              }
          }
        }

        if (!$emailExists){
            $id=$_SESSION['user_id'];
            $query="UPDATE user SET name='$name', email='$email', address='$address', gender='$gender' WHERE id='$id'";
            $result = mysqli_query($con, $query);

            if ($result) {
                header("Location:userHome.php");
                echo $result;
            }
            else {
                echo "<h1 align='center'>Updated failed</h1>";
            }

        }
        else{
            echo "<h1 align='center'>Email Already Exists</h1>";
        }

    }
}

?>