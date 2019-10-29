<?php session_start();?>

<html>
<head>
    <link rel="stylesheet" type="text/css"  href="css/adminHome.css" >
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>


<div class="home">

<div class="sideBar">
    <div class="admin">

       <?php

           $con=mysqli_connect("localhost","root","","commerce");
           $query="SELECT name FROM user where id='$_SESSION[id]'";
           $result=mysqli_query($con,$query);

           while ($admin=mysqli_fetch_assoc($result)) {
           echo "<p>$admin[name]</p>";
       }


       ?>

    </div>
    <div class="menuBar">
        <ul>
            <li><input type="button" value="Profile">
                <ul>

                    <li><input type="button" value="View" id="profile.php" onclick="request(this.id)"></li>
                    <li><input type="button" value="Edit" id="editProfile.php" onclick="request(this.id)"></li>
                    <li> <input type="button" value="Password Change" id="passChange.php" onclick="request(this.id)"></li>
                </ul>
            <li><input type="button" value="My Order" id="My Order.php" onclick="request(this.id)"></li>
            <li><input type="button" value="Purchase History" id="purchaseHistory.php" onclick="request(this.id)"></li>
            <li><input type="button" value="Sent Mail" id="sentMail.php" onclick="request(this.id)"></li>
            <li><input type="button" value="Logout" id="logout.php" onclick="window.location.href = 'logout.php'"></li>
        </ul>
    </div>
</div>

<div id="display">
    <h1>Welcome to User Panel</h1>
</div>

</div>


    <script src="js/pdfConversion/jspdf.js"></script>
    <script src="js/pdfConversion/jquery-2.1.3.js"></script>
    <script src="js/pdfConversion/pdfFromHTML.js"></script>
    <script type="text/javascript" src="js/request.js"></script>
    <script type="text/javascript" src="js/editProfile.js"></script>
    <script type="text/javascript" src="js/passChange.js"></script>
</body>
</html>