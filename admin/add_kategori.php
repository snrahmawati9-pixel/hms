<?php 
require_once 'session.php';
if (isset($_POST['submitKategori']))
{
    $getLastId=mysqli_query($con, "select * from kategori order by length(kategori_id) desc, kategori_id desc");
    if(mysqli_num_rows($getLastId)==0)
    {
        $id='K1001';
    }
    else
    {
        //sudah ada data
        $rowGetLastId=mysqli_fetch_array($getLastId);
        $getId=substr($rowGetLastId['kategori_id'],1)+1;
        $id='K'.$getId;
    }
    $insert=mysqli_query($con, "insert into kategori (kategori_id, kategori_nama, kategori_status) values ('".$id."','".$_POST['kategori_nama']."', '".$_POST['kategori_status']."')");
    if($insert==true)
    {
        header("location:kategori.php");
    }
    else
    {
        $pesan = 'Tambah kategori gagal';
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body id="menu2">

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
            <span>Tambah Kategori</span>
        </div>
        
        <div id="content_isi" align="center">
            <form action="#" method="post">
                <table border="1" width="350">
                    <tr>
                        <td width="120">Kategori</td>
                        <td width="5">:</td>
                        <td>
                            <input type="text" name="kategori_nama" autofocus>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <select name="kategori_status">
                                <option value="active">Active</option>
                                <option value="non-active">Non-Active</option>
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
                            <input type="submit" name="submitKategori" value="Submit">
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