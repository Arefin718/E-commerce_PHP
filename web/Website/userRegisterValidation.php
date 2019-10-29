<?php

        $nameValid = false;
        $emailValid = false;
        $genderValid = false;
        $passValid = false;

//Name Verify

$name=$_GET['nameField'];
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

else if(nameValid($name)){
    echo "Name can contain a-z or A-Z or dot(.) or dash(-)"."<br/>";
}

else{
    $nameValid = true;
    $name=$name;
}

function nameValid($str){
    $aName=str_split($str,1);
    foreach ($aName as $char){
        if(!(($char>='a' && $char<='z') || ($char>='A' && $char<='Z') || $char==' ' || $char=='-' || $char=='.')){
            return true;
        }
    }
}


//Email Verify

$email=$_GET['emailField'];
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


if (!isset($_GET['genderField'])){
    echo "You must select Gender"."<br/>";
}
else if ($_GET['genderField']=='m'){
    $genderValid = true;
    $gender="Male";
}
elseif ($_GET['genderField']=='f'){
    $genderValid = true;
    $gender="Female";
}
else {
    $genderValid = true;
    $gender="Other";
}


///password

$pass=$_GET['passField'];
$cpass=$_GET['cpassField'];
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
            $pass=$pass;
            $passValid=true;
        }
        else{
            echo "password doesn't match";
        }
    }
}

//address


$address=$_GET['addressField'];
$address=trim($address);



if(empty($address)) {
    echo "Please provide your address"."<br/>";
}
else{
    $address=$address;
}

//save in database


if (($nameValid==true) && ($emailValid==true) && ($genderValid==true) && ($passValid==true)) {

    $type = "user";

    $con = mysqli_connect("localhost", "root", "", "commerce");
    $query = "INSERT INTO user(name, email, address, pass, gender, type) VALUES('$name', '$email', '$address' ,'$pass', '$gender', '$type')";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<h1 align='center'>Registerd sussessfully</h1>";
    }
    else {
        echo "<h1 align='center'>Registerd failed</h1>";
    }
}

?>