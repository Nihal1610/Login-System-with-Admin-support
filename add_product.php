<?php
include 'connection.php';
include 'nav.php';
session_start();
if (!empty(isset($_POST['upload']))) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $filename = $_FILES['pic']['name'];
    $file_size = $_FILES['pic']['size'];
    $filetemp = $_FILES['pic']['tmp_name'];
    $file_size = $_FILES['pic']['size'];
    $max_file_size = 2*1024*1024;
    $allowed_Extension = array("jpg","jpeg","png");
    $image="images/".time(). $filename;
    
    if($_FILES['pic']['error']==0)
    {
        if($file_size<$max_file_size)
        {
            $extension = pathinfo($filename,PATHINFO_EXTENSION);
            if(in_array(strtolower($extension),$allowed_Extension))
            {
                $query = "INSERT INTO Products(product_name,product_image,product_category,product_price)VALUES('$name','$image','$category','$price')";
                $res = mysqli_query($con,$query);
                if($res>0)
                {
                    move_uploaded_file($filetemp,$image );
                    echo "<script>alert('Product uploaded Successfully');window.location.href='admin_home.php';</script>";
                }
                else{
                    echo "<script>alert('Product not  uploaded ');</script>";
                }
            }
            else
            {
                echo "<script>alert('only JPG,PNG,JPEG are allowed ');</script>";
            }
        }
        else{
            echo "<script>alert('max file size is 2 MB ONLY ');</script>";
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

   
    <center><h1>Welcome Back,<?php echo   $_SESSION['name'];?></h1>
<h2>Add Products </h2></center>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="main_form">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="inp"><br>


                <label for="image">Product Image</label>
                <input type="file" name="pic" class="inp"><br>


                <label for="Product Category">Product Category</label>
                <input type="text" name="category" class="inp"><br>


                <label for="Product Price">Product Price</label>
                <input type="number" name="price" class="inp"> <br>

                <div class="btn_style">
                    <input type="submit" value="Upload" name="upload" id="submit">
                </div>
            </div>
        </form>
 
</body>

</html>