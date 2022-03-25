<?php
include 'connection.php';
include 'nav.php';
session_start();
$query = "SELECT * FROM `registration` ORDER BY `id` ASC";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All USER</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1>Welcome Back,<?php echo $_SESSION['name']; ?></h1>
        <h2>Details of all Register USER'S</h2>
    </center>
    <div class="tbl_data_show_div">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>NUMBER</th>
                <th>PASSWORD</th>
            </tr>
            <?php
            $res = mysqli_query($con, $query);
            if (mysqli_num_rows($res)) {
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['number']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                    </tr>


            <?php
                }
            }
            ?>
        </table>
    </div>
</body>

</html>