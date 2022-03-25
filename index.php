<?php
include 'connection.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['cpassword'];
    $emailregEx = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
    if ($name != "" && $email != "" && $number != "" && $password != "" && $confirm_password != "") {
            if (preg_match($emailregEx,  $email)) {
                if (strlen($_POST['number']) == 10) {
                    if (strlen($_POST['password']) >= 6) {
                        if ($_POST['cpassword'] ==  $_POST['password']) {
                            $error = "";
                            if (!$error) {
                                $check_email = "SELECT * FROM registration WHERE email='$email'";
                                $res_check_email = mysqli_query($con, $check_email);
                                if (mysqli_num_rows($res_check_email) > 0) {
                                    $email_error = "Sorry... email already taken";
                                } else {
                                    $query = "INSERT INTO registration(name,email,number,password) VALUES('$name','$email','$number','$password')";
                                    $res = mysqli_query($con, $query);
                                    if ($res > 0) {
                                        echo "<script>window.location.href='login.php';alert('Registration SUccessFully');</script>";
                                    } else {
                                        echo "<script>alert('Registration Not SuccessFully');</script>";
                                    }
                                }
                            }
                        } else {
                            $cpasswordErr = "Password and Confirm Password Didn't Match";
                        }
                    } else {
                        $passwordErr = "Your Password Must Contain At Least 6 Characters!";
                    }
                } else {
                    $NumberErr = "Your Number Must be 10 Digit";
                }
            } else {
                $emailErr = "Invalid email format";
            }
        
    } else {
        $reg_error = "ERROR : Fields Can Not be blank";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
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
        <form action="" method="POST" id="sign_in_form">

            <?php if (!empty($reg_error)) {
                echo '<p>' . $reg_error . '</p>';
            }
            ?>
            <?php if (!empty($email_error)) {
                echo "<script>alert('Sorry... email already taken');</script>";
            }
            ?>
            <div class="main_form">


                <label for="name">UserNAme</label>
                <input type="text" name="name" id="name" class="inp">
                <span id="name_error"></span><br>
                <?php if (!empty($nameErr)) {
                    echo '<p>' . $nameErr . '</p>';
                }
                ?>

                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="inp">
                <span id="email_error"></span><br>

                <?php if (!empty($emailErr)) {
                    echo '<p>' . $emailErr . '</p>';
                }
                ?>

                <label for="number">Number</label>
                <input type="number" name="number" id="number" class="inp">
                <span id="number_error"></span><br>

                <?php if (!empty($NumberErr)) {
                    echo '<p>' . $NumberErr . '</p>';
                }
                ?>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="inp">
                <span id="password_error"></span><br>

                <?php if (!empty($passwordErr)) {
                    echo '<p>' . $passwordErr . '</p>';
                }
                ?>

                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" class="inp">
                <span id="cpassword_error"></span><br>

                <?php if (!empty($cpasswordErr)) {
                    echo '<p>' . $cpasswordErr . '</p>';
                }
                ?>
                <p>Already Register?..<a href="login.php" style="color:black;text-decoration:none;">Login</a></p><br>
                <div class="btn_style">
                    <input type="submit" value="submit" name="submit" id="submit">
                </div>
            </div>
        </form>
    </div>
    <script src="index.js">

    </script>
</body>

</html>