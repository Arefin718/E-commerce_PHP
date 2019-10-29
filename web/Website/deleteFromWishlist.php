<?php
session_start();
$pid=$_GET['pid'];
$userId=$_SESSION['id'];

$wishlist = simplexml_load_file("file/wishlist.xml");

foreach ($wishlist->children() as $user) {
    if ($user['id'] == $userId) {
        if ($user->productId == $pid) {
            unset($user[0]);
        }
    }
}

$wishlist->asXML("file/wishlist.xml");
header("Location:wishlist.php");
//foreach ( $nodeList as $element ) {
//    $wishlist->parentNode->removeChild($element);
//}


?>