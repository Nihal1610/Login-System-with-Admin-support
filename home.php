<?php
include 'connection.php';
session_start();
if (!empty(isset($_SESSION['name']))) {

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
               
            </div>

         
        </div>
    </body>

    </html>
<?php


                
              
            } else {
                echo "<script>alert('Please login firstly...');window.location.href='login.php';</script>";
            }

?>