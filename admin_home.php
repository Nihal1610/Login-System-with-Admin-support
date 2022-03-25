<?php
include 'connection.php';
include 'nav.php';
session_start();

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
<h2>Lis of all Products</h2></center>
    <table border="1">
        <tr>
            <th>Product_id </th>
            <th>Product_name </th>
            <th>Product_Image </th>
            <th>Product_Categeory </th>
            <th>Product_Price</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
            $query = "SELECT *FROM Products";
            $res = mysqli_query($con,$query);
            if(mysqli_num_rows($res)>0){
                while($row=mysqli_fetch_assoc($res))
                {
                    ?>

                    <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><img src="<?php echo $row['product_image']; ?>" height="150px" width="150px"></td>
                        <td><?php echo $row['product_category']; ?></td>
                        <td><?php echo $row['product_price']; ?></td>
                        <td><a href="update_product.php?id=<?php echo $row['product_id']; ?>"><button id="submit">Update</button></a></td>
                        <td><a href="delete_product.php?id=<?php echo $row['product_id']; ?>"><button id="submit">Delete</button></a></td>
                    </tr>

<?php
                }
            }
        ?>
    </table>
</body>
</html>
