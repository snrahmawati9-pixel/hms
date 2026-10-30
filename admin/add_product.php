<?php 
require_once 'session.php';
if (isset($_POST['submitProduct']))
{
    $cekId=mysqli_query($con, "select * from product where substr(product_id,2,2)='".date("y")."' and substr(product_id,4,2)='".date("m")."' order by product_id desc");
    if(mysqli_num_rows($cekId)==0)
    {
        $id='P'.date("ym").'1001';
    }
    else
    {
        $rowCekId=mysqli_fetch_array($cekId);
        $getId=substr($rowCekId['product_id'],-4)+1;
        $id='P'.date("ym").$getId;
    }

    $folderTujuan='../product/';
    $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
    $namaFile=$id.'.'.$ext;
    move_uploaded_file($_FILES['gambar']['tmp_name'], $folderTujuan.$namaFile);

    $insert=mysqli_query($con, "insert into product (product_id, kategori_id, product_nama, product_keterangan, product_harga, product_stock, product_gambar, product_status) values ('".$id."','".$_POST['kategori_id']."','".$_POST['product_nama']."','".$_POST['deskripsi']."','".$_POST['product_harga']."','".$_POST['product_stock']."','".$namaFile."','".$_POST['product_status']."')");

    if($insert==true)
    {
        $pesan="Tambah product berhasil";
    }
    else
    {
        $pesan='Tambah product gagal';
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
            <span>Tambah Product</span>
        </div>
        
        <div id="content_isi" align="center">
            <form action="#" method="post" enctype="multipart/form-data">
                <table border="1" width="350">
                    <tr>
                        <td width="120">Kategori</td>
                        <td width="5">:</td>
                        <td>
                            <select name="kategori_id">
                                <option value="">-------------</option>
                                <?php
                                    $kategori=mysqli_query($con, "select * from kategori where kategori_status='active' ");
                                    while ($rowKategori=mysqli_fetch_array($kategori))
                                    {
                                        ?>
                                        <option value="<?= $rowKategori['kategori_id']?>">
                                            <?= $rowKategori['kategori_nama']; ?>
                                        </option>
                                        <?php    
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="120">Product Nama</td>
                        <td width="5">:</td>
                        <td>
                            <input type="text" name="product_nama">
                        </td>
                    </tr>
                    <tr>
                        <td width="120">Deskripsi</td>
                        <td width="5">:</td>
                        <td>
                            <textarea name="deskripsi"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="120">Harga</td>
                        <td width="5">:</td>
                        <td>
                            <input type="text" name="product_harga">
                        </td>
                    </tr>
                    <tr>
                        <td width="120">Stock</td>
                        <td width="5">:</td>
                        <td>
                            <input type="text" name="product_stock">
                        </td>
                    </tr>
                    <tr>
                        <td width="120">Gambar</td>
                        <td width="5">:</td>
                        <td>
                            <input type="file" name="gambar">
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <select name="product_status">
                                <option value="active">Active</option>
                                <option value="non-active">Non-Active</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3" align="center">
                            <?= @$pesan; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <input type="submit" name="submitProduct" value="Submit">
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