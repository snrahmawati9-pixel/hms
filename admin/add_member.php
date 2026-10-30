<?php 
require_once 'session.php';
if(isset($_POST['submitMember']))
{
	if(empty($_POST['email']))
	{
		$pesan='Email tidak boleh kosong';
	}
	else if(empty($_POST['password']))
	{
		$pesan='Password tidak boleh kosong';
	}
	else if(empty($_POST['nama']))
	{
		$pesan='Nama tidak boleh kosong';
	}
	else if(empty($_POST['alamat']))
	{
		$pesan='Alamat tidak boleh kosong';
	}
	else
	{

		$cekEmail=mysqli_query($con,"select * from user where email='".$_POST['email']."'");
		if(mysqli_num_rows($cekEmail)==0)
		{
			$insert=mysqli_query($con,"insert into user (email, nama, password, alamat, telepon, type, status) values ('".$_POST['email']."','".$_POST['nama']."','".md5($_POST['password'])."','".$_POST['alamat']."','".$_POST['telepon']."','member','active')");
			if($insert==true)
			{
				$pesan='Email berhasil ditambah';
			}
			else
			{
				$pesan='Tambah email gagal';
			}
		}
		else
		{
			//email sudah ada di table user
			$pesan='Email sudah pernah terdaftar';
		}
	}

}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body id="menu3">

<div id="container">
	<div id="header">
    	<?php
        	include 'header.php';
		?>
    </div>
    <div id="menu">
    	<?php
        	include 'menu.php';
		?>
    </div>
    <div id="content">
    	<div align="center" class="judulContent">
    		<span>Tambah Member</span>
    	</div>
    	
    	<div id="content_isi" align="center">
    		<form action="#" method="post">
            	<table border="1" width="350">
            		<tr>
            			<td width="120">Email</td>
            			<td width="5">:</td>
            			<td>
            				<input type="text" name="email">
            			</td>
            		</tr>
            		<tr>
            			<td>Nama</td>
            			<td>:</td>
            			<td><input type="text" name="nama"></td>
            		</tr>
            		<tr>
            			<td>Password</td>
            			<td>:</td>
            			<td><input type="Password" name="password"></td>
            		</tr>
            		<tr>
            			<td>Alamat</td>
            			<td>:</td>
            			<td>
            				<textarea name="alamat"></textarea>
            			</td>
            		</tr>
            		<tr>
            			<td>Telepon</td>
            			<td>:</td>
            			<td><input type="text" name="telepon"></td>
            		</tr>
            		<tr>
            			<td colspan="3" align="center">
            				<?php echo @$pesan; ?>
            			</td>
            		</tr>

            		<tr>
            			<td colspan="3" align="center">
            				<input type="submit" name="submitMember" value="Submit">
            				&nbsp;&nbsp;
            				<input type="reset" name="reset" value="Reset">
            			</td>
            		</tr>
            	</table>
            </form>
    	</div>
    	
    </div>
    <div id="footer">
    	<?php
        	include 'footer.php';
		?> 
    </div>
</div>
</body>
</html>