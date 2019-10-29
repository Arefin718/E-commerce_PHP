<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/featuredBestSellerNewArrival.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=errorPage.php">
    </noscript>
</head>
<body>

<?php include_once ("header.php")?>

    <div class="slider">

                      <img style="display: none" class="sliderImage" src="images/slider/cover1.jpg">
                      <img style="display: none" class="sliderImage" src="images/slider/cover2.jpg">
                      <img style="display: none" class="sliderImage" src="images/slider/cover3.png">
                      <img style="display: none" class="sliderImage" src="images/slider/cover4.png">
                      <img style="display: none" class="sliderImage" src="images/slider/cover5.jpg">
                      <td><img style="width: 100%; height: 400px"  class="sliderImage" src="images/slider/cover1.jpg"></td>

    </div>

    <div class="products">

        <div class="button">
            <input type="button" value="BEST SELLERS" id="clothing" onclick="request(this.id)">
            <input type="button" value="FEATURED" id="electronics" onclick="request(this.id)">
            <input type="button" value="NEW ARRIVAL" id="smartphone" onclick="request(this.id)">
        </div>


        <div class="product" id="pp">

        </div>

        <?php include_once ("footer.php")?>

        <script src="js/featuredBestSellerNewArrival.js"></script>
        <script src="js/slider.js"></script>
</body>
</html>