<?php 
session_start();
session_destroy();
//unset($_SESSION['hms']);
header("location:index.php");
?>