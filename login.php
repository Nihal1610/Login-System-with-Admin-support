<?php
include 'connection.php';
session_start();
if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT *  from registration WHERE email='$email' and password='$password'";
    $res = mysqli_query($con, $query);
    $fetch_array_data = mysqli_fetch_assoc($res);
    //    print_r($fetch_array_data);

    if (mysqli_num_rows($res) > 0) {

        if ($fetch_array_data['email'] == "admin@admin.com") {
            $_SESSION['email'] = $email;
            // $_SESSION['name'] = $name;

            echo "<script>alert('Admin login Successfully...');window.location.href='admin_home.php';</script>";
        } else {
           
            echo "<script>alert('Login Successfully...');window.location.href='home.php';</script>";
        }
        $_SESSION['name'] = $fetch_array_data['name'];
        $_SESSION['email'] = $fetch_array_data['email'];
        $_SESSION['number'] = $fetch_array_data['number'];
        $_SESSION['password'] = $fetch_array_data['password'];
      
    } else {
        echo "<script>alert('Username and Password are invalid ...');window.location.href='login.php';</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="form_design">
        <div class="heading">
            <ul>
                <li><a href="index.php">Registration</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="home.php">Dashboard</a></li>
            </ul>
        </div>
        <form action="" method="POST" id="login_in_form">
            <div class="main_form">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" class="inp">
                <span id="email_error"></span><br>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="inp">
                <span id="password_error"></span><br>
                <p>New User? Please Register..<a href="index.php" style="color:black;text-decoration:none;">Register</a></p><br>
                <div class="btn_style">
                    <input type="submit" value="Login" name="login_btn" id="submit">
                </div>
            </div>

        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#login_in_form').submit(function() {
                var email = $('#email').val();
                var password = $('#password').val();
                if (email == "") {
                    $('#email_error').html("Email can't Be blank");
                    return false;
                } else {
                    $('#email_error').html("");
                }
                if (password == "") {
                    $('#password_error').html("Password can't be blank");
                    return false;
                } else {
                    $('#password_error').html("");
                }
            });

        });
    </script>
</body>

</html>