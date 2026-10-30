<?php 
require_once 'session.php';
if(isset($_POST['editAdmin']))
{
	$update=mysqli_query($con, "update user set
						nama = '".$_POST['nama']."',
						alamat = '".$_POST['alamat']."',
						telepon = '".$_POST['telepon']."',
						status = '".$_POST['status']."'
						where email= '".$_GET['id']."'
						");
	if($update==true)
	{
		$pesan='Update data berhasil';
	}
	else
	{
		$pesan='Update data gagal';
	}
}
$data=mysqli_query($con, "select * from user where email='".$_GET['id']."'");
$rowData=mysqli_fetch_array($data);
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
            <span>Edit Admin <?php echo @$_GET['id'] ?></span>
        </div>
        
        <div id="content_isi" align="center">
        	
            <form action="#" method="post">
                <table border="1" width="350">
                    <tr>
                        <td width="120">Email</td>
                        <td width="5">:</td>
                        <td>
                            <?php echo $rowData['email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="nama" value="<?php echo $rowData['nama']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                            <textarea name="alamat"><?php echo $rowData['alamat'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td><input type="text" name="telepon" value="<?php echo $rowData['telepon'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                        	<select name="status">
                        		<?php 
                        		if($rowData['status']=='active')
                        		{
                        			?>
                        			<option value="active" selected>Active</option>
                        			<option value="non-active">Non-Active</option>
                        			<?php
                        		}
                        		else
                        		{
                        			?>
                        			<option value="active">Active</option>
                        			<option value="non-active" selected>Non-Active</option>
                        			<?php
                        		}
                        		?>
                        		
                        	</select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <?php echo @$pesan; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <input type="submit" name="editAdmin" value="Submit">
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