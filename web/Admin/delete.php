<?php
$id=$_GET['pid'];

$con=mysqli_connect("localhost","root","","commerce");
$query="DELETE FROM product WHERE id=$id";
mysqli_query($con,$query);
header("Location: viewProducts.php");

?>