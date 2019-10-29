<?php session_start(); ?>
<html>
<head>
    <link rel="stylesheet" type="text/css"  href="css/adminHome.css" >
</head>
<body>


<div class="home">

<div class="sideBar">
    <div class="admin">
<?php
        $con=mysqli_connect("localhost","root","","commerce");
        $id=$_SESSION['adminId'];
        $query="SELECT name,image,type FROM admin where id='$id'";
        $result=mysqli_query($con,$query);
        while ($admin=mysqli_fetch_assoc($result)) {
?>
        <img src="<?php echo $admin['image']?>">

       <p><?php echo $admin['name']?></p>
       <p><?php echo ucfirst($admin['type'])?></p>


<?php } ?>
    </div>
    <div class="menuBar">
        <ul>
            <li><input type="button" value="Home" onclick="window.location.reload()" ></li>
            <li><input type="button" value="Profile">
            <ul>

                <li><input type="button" value="View" id="profile.php" onclick="request(this.id)"></li>
                <li><input type="button" value="Edit" id="editProfile.php" onclick="request(this.id)"></li>
                <li> <input type="button" value="Password Change" id="passChange.php" onclick="request(this.id)"></li>
                <li><input type="button" value="Profile Picture Change" id="profilePictureChange.php" onclick="request(this.id)"></li>
            </ul>

            </li>
            <li><input type="button" value="Product">

                <ul>
                    <li><input type="button" value="Upload" id="productUpload.php" onclick="request(this.id)"></li>
                    <li><input type="button" value="View"   id="viewProducts.php" onclick="request(this.id)"></li>
                </ul>

            </li>
            <li><input type="button" value="Report" id="report.php" onclick="window.location.href = 'report.php'"></li>
            <li><input type="button" value="Order" id="order.php" onclick="request(this.id)"></li>
            <li><input type="button" value="Delivered Product" id="deliveredProduct.php" onclick="request(this.id)"></li>
            <li><input type="button" value="Suggestions" id="suggestions.php" onclick="request(this.id)"></li>
            <li><input type="button" value="Mail" id="getMail.php" onclick="request(this.id)"></li>

            <li><input type="button" value="Users" id="userView.php" onclick="request(this.id)"></li>
            <li><input type="button" value="Admin" id="" onclick="">
            <ul>
                <li><input type="button" value="View" id="userView.php" onclick="request(this.id)">
                <li><input type="button" value="Add Admin" id="addAdmin.php" onclick="request(this.id)">
            </ul>

            <li><input type="button" value="Logout" id="logout.php" onclick="window.open(this.id)"></li>

        </ul>
    </div>
</div>

<div id="display">
    <h1>Welcome to Admin Panel</h1>
</div>

</div>

<script>


    function validCheck(){
        var des = document.getElementById("des")[0].value;
        if(des.length == 0){
            document.getElementById("error").innerHTML = "Cant Be empty";
            document.getElementById("error").style.color = "red";
        }else{
            var form = document.getElementById("form");
            form.submit();
        }
    }

</script>

        <script src="js/pdfConversion/jspdf.js"></script>
        <script src="js/pdfConversion/jquery-2.1.3.js"></script>
        <script src="js/pdfConversion/pdfFromHTML.js"></script>
        <script type="text/javascript" src="js/request.js"></script>
        <script src="js/adminRegisterValidation.js"></script>
        <script src="js/editProfile.js"></script>
        <script src="js/passChange.js"></script>
        <script src="js/profilePictureChange.js"></script>
        <script src="js/productUpload.js"></script>
        <script src="js/searchByName.js"></script>
</body>
</html>