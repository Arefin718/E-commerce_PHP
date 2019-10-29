<?php
$key = $_GET['key'];
$con=mysqli_connect("localhost","root","","commerce");
$query="SELECT name FROM product"; // for selecting category as unique

$name=mysqli_query($con,$query);   // storing result for unique category
while ($productName=mysqli_fetch_assoc($name)) {
    $users[]=$productName['name'];
}

$str="";
$count=0;
foreach($users as $user){
    if(stristr($user, $key)){
        $count++;
        $vuser=$user;
        if ($count<6){
            if (strlen($vuser)>20){
                $vuser=substr($vuser,0,20)."...";
            }
        $str.="<li id='$user' onclick='search(this.id)' onmouseover='show(this.id)'>$vuser</li>";
        }
    }
}

echo $str;

?>

<script src="js/SearchByName.js"></script>
