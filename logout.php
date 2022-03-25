<?php

session_start();
session_destroy();
echo "<script>alert('logout...');window.location.href='login.php';</script>";
?>