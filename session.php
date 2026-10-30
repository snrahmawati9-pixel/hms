<?php 
session_start();
require_once 'koneksi.php';

$user=mysqli_query($con, "SELECT * FROM user where email='".@$_SESSION['hms']."'");
$rowUser=mysqli_fetch_array($user);
?>

