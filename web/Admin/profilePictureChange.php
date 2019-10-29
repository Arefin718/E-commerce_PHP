<?php session_start(); ?>

<html>
<head>
        <link rel="stylesheet" type="text/css" href="css/register.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>
   <div oncancel="profilePictureChange">
       <div class="registration">
           <form action="profilePictureChange.php" method="post" id="ppChangeform" enctype="multipart/form-data">
               <table>
                   <tr>
                       <td colspan="3"><h2>Profile Picture Change</h2></td>
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
                           <input type="button" onclick="ppValidation()" value="Submit">
                       </td>
                   </tr>

               </table>

           </form>
   </div>
       <script src="js/profilePictureChange.js"></script>
</body>
</html>


<?php


if ($_SERVER['REQUEST_METHOD']=="POST"){
        $con = mysqli_connect("localhost", "root", "", "commerce");

        $id=$_SESSION['adminId'];
        $query="SELECT image from admin WHERE id='$id'";
        $result = mysqli_query($con, $query);
        while ($admin=mysqli_fetch_assoc($result)){
            $preImagePath=$admin['image'];
        }

//    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    unlink($preImagePath);
    $_FILES["imageUpload"]["name"]=$_SESSION['adminId'].".jpg";
    $target_file = "images/".$_FILES["imageUpload"]["name"];
    move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file);



        $query="UPDATE admin SET image='$target_file' WHERE id='$id'";
        $result = mysqli_query($con, $query);

        if ($result) {
            header("Location:adminHome.php");
        }
        else {
            echo "<h1 align='center'>Photo Change failed</h1>";
        }

}

?>