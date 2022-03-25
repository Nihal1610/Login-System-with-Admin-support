<?php
include 'connection.php';

session_start();
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];


    $query = "UPDATE registration SET name='$name', password='$password' WHERE email='$email'";
    $res = mysqli_query($con, $query);
    if ($res > 0) {
        $_SESSION['name'] =  $name;
        $_SESSION['email'] =  $password;
        echo "<script>alert('Data Updated...');</script>";
    } else {
        echo "<script>alert('Data Not Updated...');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <form action="" method="POST" id="update_in_form">
            <div class="main_form">


                <label for="name">UserNAme</label>
                <input type="text" value="<?php echo $_SESSION['name']; ?>" name="name" id="name" class="inp"><br>


                <label for="email">Email</label>
                <input type="text" value="<?php echo $_SESSION['email']; ?>" readonly name="email" id="email" class="inp"><br>


                <label for="number">Number</label>
                <input type="number" value="<?php echo $_SESSION['number']; ?>" readonly name="number" id="number" class="inp"><br>


                <label for="password">Password</label>
                <input type="text" value="<?php echo $_SESSION['password']; ?>" name="password" id="password" class="inp"> <br>



                <div class="btn_style">
                    <input type="submit" value="Save Change" name="save" id="submit">
                </div>
            </div>
        </form>
    </div>
</body>

</html>