<?php
include 'connection.php';
session_start();



$query = "select product_category from Products group by product_category";
$res = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form_design">
        <div class="outer">
            <h1>Welcome Back ,<?php echo $_SESSION['name']; ?></h1>
            <div class="btn_style">
                <a href="logout.php"><input type="button" value="logout" id="submit"></a>
            </div>
            <div class="btn_style">
                <a href="edit_profile.php"><input type="button" value="Update Profile" id="submit"></a>
            </div>
            <div class="btn_style">
                <a href="view_all.php"><input type="button" value="View All Products" id="submit"></a>
            </div>
            <div class="btn_style">
                <a href="home.php"><input type="button" value="Dashboard" id="submit"></a>
            </div>
        </div>
        <?php

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $query1 = "SELECT * FROM Products";
                $res1 = mysqli_query($con, $query1);

        ?>
                <center>
                    <h1><?php echo $row1 =  $row['product_category']; ?></h1>
                </center>
                <?php
                while ($row2 = mysqli_fetch_assoc($res1)) {
                    if ($row1 == $row2['product_category']) {
                ?>
                        <div class="parent">
                            <!-- <div class="child"> -->
                                <h2> Name: <?php echo $row2['product_name']; ?></h2>
                                <img src=" <?php echo $row2['product_image']; ?>" height="100px" width="100px">

                                <h2>Price: <?php echo $row2['product_price']; ?></h2>
                            <!-- </div> -->

                        </div>
                <?php
                    }
                }
                ?>

        <?php

            }
        }

        ?>
    </div>
</body>

</html>