<?php
include 'connection.php';
include 'nav.php';
session_start();

$id = $_GET['id'];

$sql = "Delete  from Products where product_id = '$id'";
   $result= mysqli_query($con,$sql);
   if($result){
       echo "<script>alert('Deleted Successfully..');window.location.href='admin_home.php';</script>";
   }else{
       echo "erro".mysqli_error($conn);
   }

?>

