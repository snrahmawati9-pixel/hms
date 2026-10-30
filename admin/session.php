<?php 
session_start();
require_once 'koneksi.php';
if(!empty($_SESSION['hms']))
{
	//ada sessionnya
	$user=mysqli_query($con, "select * from user where email = '".$_SESSION['hms']."'");
	$rowUser=mysqli_fetch_array($user);

	if($rowUser['status']!='active'|| $rowUser['type']!='administrator' || $rowUser['session_id']!=session_id())
	{
		header("location:logout.php");
	}
}
else
{
	header("location:logout.php");
}
?>