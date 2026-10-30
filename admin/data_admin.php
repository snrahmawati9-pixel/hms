<?php 
require_once 'session.php';

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
            <span>Data Admin <?php echo @$_GET['id'] ?></span>
        </div>
        
        <div id="content_isi" align="center">
        	
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
                        <td><?php echo $rowData['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                            <?php echo $rowData['alamat'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td><?php echo $rowData['telepon'] ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                        		<?php 
                        		echo $rowData['status'];
                        		?>
                        </td>
                    </tr>
                </table>
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