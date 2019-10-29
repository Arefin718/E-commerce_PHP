<table>
    <tr>
        <?php
       $cat=$_GET['type'];
        $con=mysqli_connect("localhost","root","","commerce");
        $query = "SELECT * FROM product where category='$cat'";
        $result = mysqli_query($con, $query);
        $noofproduct = 0;
        while ($product = mysqli_fetch_assoc($result)) {

            if ($noofproduct<8){
            if ($noofproduct%4 ==0) {
                echo "<tr></tr>";
            }
            ?>

            <td>
                <table>

                    <?php  $noofproduct++; ?>
                    <tr>
                    <tr> <td><a href="productDescription.php?pid=<?php echo $product['id'] ?>"><img src="<?php echo $product['image'] ?>"></a></td></tr>
                    </td>
                    </tr>
                    <tr>
                        <td><?php echo  $product['name']?></td>
                    </tr>
                    <tr>
                        <td><?php echo "Price: " . $product['price'] . " tk" ?></td>
                    </tr>
                </table>
            </td>

            <?php

        } }?>

    </tr>

</table>


