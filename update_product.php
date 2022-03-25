<?php
include 'connection.php';
include 'nav.php';
session_start();
if (!empty(isset($_POST['update']))) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $id = $_GET['id'];

    $filename = $_FILES['pic']['name'];
    $file_size = $_FILES['pic']['size'];
    $filetemp = $_FILES['pic']['tmp_name'];
    $file_size = $_FILES['pic']['size'];
    $max_file_size = 2 * 1024 * 1024;
    $allowed_Extension = array("jpg", "jpeg", "png");
    $image = "images/" . time() . $filename;

    if ($_FILES['pic']['error'] == 0) {
        if ($file_size < $max_file_size) {
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), $allowed_Extension)) {
                $query = "UPDATE Products SET product_name='$name',product_image='$image',product_category='$category',product_price='$price' WHERE product_id='$id'";
                $res = mysqli_query($con, $query);
                if ($res > 0) {
                    move_uploaded_file($filetemp, $image);
                    echo "<script>alert('Update Successfully..');window.location.href='admin_home.php';</script>";
                } else {
                    echo "<script>alert('Update not Successfully.. ');</script>";
                }
            } else {
                echo "<script>alert('only JPG,PNG,JPEG file are allowed ');</script>";
            }
        } else {
            echo "<script>alert('Maximum file size is 2 MB ONLY ');</script>";
        }
    }
}







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1>Welcome Back,<?php echo $_SESSION['name']; ?></h1>
        <h2>Update Product Details</h2>
    </center>
    <?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM Products WHERE product_id='$id'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($res);
}



    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="main_form">
            <label for="name">Product Name</label>
            <input type="text" name="name" value="<?php echo $row['product_name']; ?>"  class="inp"><br>


            <label for="image">Product Image</label>
            <input type="file" name="pic" class="inp"><br>


            <label for="Product Category">Product Category</label>
            <input type="text" name="category" value="<?php echo $row['product_category']; ?>" class="inp"><br>


            <label for="product_price">Product Price</label>
            <input type="number" name="price" value="<?php echo $row['product_price']; ?>" class="inp"> <br>

            <div class="btn_style">
                <input type="submit" value="update" name="update" id="submit">
            </div>
        </div>
    </form>
</body>

</html>