<?php 
require_once 'session.php';

$id = mysqli_real_escape_string($con, @$_GET['id']);

if(isset($_POST['editProduct']))
{
    $kategori = mysqli_real_escape_string($con, $_POST['kategori_id']);
    $nama     = mysqli_real_escape_string($con, $_POST['product_nama']);
    $harga    = (int)$_POST['product_harga'];
    $stock    = (int)$_POST['product_stock'];
    $status   = mysqli_real_escape_string($con, $_POST['product_status']);

    $update=mysqli_query($con, "update product set
                            kategori_id = '$kategori',
                            product_nama = '$nama',
                            product_harga = '$harga',
                            product_stock = '$stock',
                            product_status = '$status'
                            where product_id = '$id'
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

$data=mysqli_query($con,"select * from product where product_id='$id'");
$rowData=mysqli_fetch_array($data);
$kategoriList=mysqli_query($con,"select * from kategori");
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
            <span>Edit Product <?php echo htmlspecialchars(@$_GET['id']); ?></span>
        </div>
        
        <div id="content_isi" align="center">

            <form action="#" method="post">
                <table border="1" width="350">
                    <tr>
                        <td width="120">Product Id</td>
                        <td width="5">:</td>
                        <td><?php echo $rowData['product_id'];?></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>
                            <select name="kategori_id">
                                <?php while($k=mysqli_fetch_array($kategoriList)) { ?>
                                    <option value="<?php echo $k['kategori_id']; ?>" <?php if($k['kategori_id']==$rowData['kategori_id']) echo 'selected'; ?>>
                                        <?php echo $k['kategori_nama']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="product_nama" value="<?php echo htmlspecialchars($rowData['product_nama']);?>"></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td><input type="text" name="product_harga" value="<?php echo $rowData['product_harga'];?>"></td>
                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td>:</td>
                        <td><input type="text" name="product_stock" value="<?php echo $rowData['product_stock'];?>"></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                        <select name="product_status">
                            <option value="active" <?php if($rowData['product_status']=='active') echo 'selected'; ?>>Active</option>
                            <option value="non-active" <?php if($rowData['product_status']!='active') echo 'selected'; ?>>Non-Active</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td>:</td>
                        <td>
                            <?php if(!empty($rowData['product_gambar']) && file_exists('../product/'.$rowData['product_gambar'])) { ?>
                                <img src="../product/<?php echo $rowData['product_gambar']; ?>" width="100">
                            <?php } else { ?>
                                <i>Belum ada gambar</i>
                            <?php } ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" align="center">
                            <?php echo @$pesan; ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" align="center">
                            <input type="submit" name="editProduct" value="Submit">
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