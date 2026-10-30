<?php 
require_once 'session.php';
if(isset($_POST['editKategori']))
{
    $update=mysqli_query($con, "update kategori set
                        kategori_nama = '".$_POST['kategori_nama']."',
                        kategori_status = '".$_POST['kategori_status']."'
                        where kategori_id= '".$_GET['id']."'
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
$data=mysqli_query($con, "select * from kategori where kategori_id='".$_GET['id']."'");
$rowData=mysqli_fetch_array($data);
$namaList=mysqli_query($con, "select distinct kategori_nama from kategori order by kategori_nama asc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />
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
            <span>Edit Kategori <?php echo @$_GET['id'] ?></span>
        </div>
        
        <div id="content_isi" align="center" style="min-height:0;">
            
            <form action="#" method="post">
                <table border="1" width="350">
                    <tr>
                        <td width="120">Kategori Id</td>
                        <td width="5">:</td>
                        <td>
                            <?php echo $rowData['kategori_id']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Kategori Nama</td>
                        <td>:</td>
                        <td>
                            <select name="kategori_nama">
                                <?php while($n=mysqli_fetch_array($namaList)) { ?>
                                    <option value="<?php echo $n['kategori_nama']; ?>" <?php if($n['kategori_nama']==$rowData['kategori_nama']) echo 'selected'; ?>>
                                        <?php echo $n['kategori_nama']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <select name="kategori_status">
                                <?php 
                                if(strtolower($rowData['kategori_status'])=='active')
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
                            <input type="submit" name="editKategori" value="Submit">
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