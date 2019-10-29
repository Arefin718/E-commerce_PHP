<?php
$name="";
$price="";
$buyingprice="";
$description="";
$quantity="";
$image="";
$message="";
?>

<html>
<head>
    <link rel="stylesheet" type="text/css"  href="css/productUpload.css" >
    <script src="js/productUpload.js"></script>



</head>
<body>
<div class="display">
    <h1>Product Upload</h1>
    <form  action="productUpload.php" method="post" id="productupload" enctype="multipart/form-data">
        <table>


            <tr>
                <td>Product Name</td>
                <td><input type="text" name="pname" id ="pname"></td>
                <td><span id="pnameerror"><?php echo $name; ?></span></td>
            </tr>

            <tr>
                <td>Selling Price</td>
                <td><input type="text" name="price" id ="price"></td>
                <td><span id="priceerror"><?php echo $price; ?></span></td>
            </tr>

            <tr>
                <td>Buying Price</td>
                <td><input type="text" name="buyingprice" id ="buyingprice"></td>
                <td><span id="buyingpriceerror"><?php echo $buyingprice; ?></span></td>
            </tr>

            <tr>
                <td>Description</td>
                <td><textarea id="description" name="description" id ="description"></textarea></td>
                <td><span id="descriptionerror"><?php echo $description; ?></span></td>
            </tr>

            <tr>
                <td>Quantity</td>
                <td><input type="text" name="quantity" id ="quantity"></td>
                <td><span id="quantityerror"><?php echo $quantity; ?></span></td>
            </tr>

            <tr>
                <td>Category</td>
                <td>
                    <select name="cat" id ="cat">
                       <?php
                       $con=mysqli_connect("localhost","root","","commerce");
                       $uquery="SELECT DISTINCT(category) FROM product"; // for selecting category as unique

                       $uresult=mysqli_query($con,$uquery);   // storing result for unique category
                       while ($pro=mysqli_fetch_assoc($uresult)) {
                           echo "<option>$pro[category]</option>";
                       }

                       ?>

                    </select>

                <input type="button" style="width: 60px; height: 30px;" value="ADD" id="newcate" onclick="newCat()">
                        <span id="newCat">
                            <input style="visibility: hidden;width: 350px; height: 30px" namme="cat" type="text" id="newText">
                        </span>
                </td>
            </tr>

            <tr>
                <td>Image</td>
                <td><input type="file" name="image" id ="image"></td>
                <td><span id="fileerror"><?php echo $image; ?></span></td>
            </tr>

            <tr><td colspan="2" align="right">
                    <input type="reset" value="Reset">
                    <input type="button" value="Upload" onclick="Validation()">
                </td></tr>


        </table>
    </form>
    <span><?php echo $message; ?></span>
</div>


</body>
</html>



<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['pname'];
    $nameValid=false;
    $productPrice = $_POST['price'];
    $priceValid=false;
    $buyingPrice = $_POST['buyingprice'];
    $buypriceValid=false;
    $productDescription = $_POST['description'];
    $descriptionValid=false;
    $productQuantity = $_POST['quantity'];
    $quantityValid=false;
    $productCategory= $_POST['cat'];
    $productImage = $_FILES['image'];
    $imageValid=false;
    $time = date('Y-d-m H:i:s', time());


    if (strlen($productName) == 0) {
        $name = "Name must not be empty";

    } else {
        $name = "";
        $nameValid=true;
    }

    if (strlen($productPrice) == 0) {
        $price = "Price must not be empty";

    } else {

        if(is_numeric($productPrice)) {
            $price = "";
            $priceValid = true;
        }else{
            $price = "Price must  be Numeric";
        }
    }

    if (strlen($buyingPrice) == 0) {
        $buyingprice = "Price must not be empty";

    } else {

        if(is_numeric($buyingPrice)){
        $buyingprice = "";
        $buypriceValid = true;
    }
    }

    if (strlen($productDescription) == 0) {
        $buyingprice = "Description must not be empty";

    } else {
        $description  = "";
        $descriptionValid=true;
    }

    if (strlen($productQuantity) == 0) {
        $quantity  = "quanitity must not be empty";

    } else {
        if(is_numeric($productQuantity)){
        $quantity  = "";
        $quantityValid=true;
        }
        else{  $quantity  = "Quantity must  be Numeric";    }

    }


    if (!isset($productImage)) {
        $image  = "Image must not be empty";

    } else if(strpos($productImage,'jpg')) {
        $image  = "Please select a jpg image";
    }

    else {
        $image  = "";
        $imageValid=true;
        $root=$_SERVER['DOCUMENT_ROOT'];
        $_FILES['image']['name']=$productName.".jpg";
        $tmp_target="images/".$productCategory;
        if(is_dir($tmp_target))
        {
            $target_file="$root/web/website/images/".$productCategory."/".$_FILES['image']['name'];

        }
        else
        {
            mkdir($tmp_target, 0777, true);
            $target_file=$tmp_target."/".$_FILES['image']['name'];
        }




        move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);

    }


    $target_file = "images/".$productCategory.'/'.$_FILES['image']['name'];
     if($nameValid==true && $priceValid==true && $buypriceValid==true && $descriptionValid==true && $quantityValid==true && $imageValid==true) {
         $con = mysqli_connect("localhost", "root", "", "commerce");
         $query = "INSERT INTO product(name, price, Buying_Price, category, quantity, description, image, date) 
    VALUES( '$productName' , '$productPrice','$buyingPrice', '$productCategory', '$productQuantity', 
	'$productDescription', '$target_file', NOW())";


         $result = mysqli_query($con, $query);

         if (!$result) {
               $message="Upload Fail";
             var_dump($result);
         } else {
             $message="Upload Successful";
           //   header("Location: productUpload.php");

         }

     }else{
         $message="Something wrong. Check the values again";
     }


}


?>

