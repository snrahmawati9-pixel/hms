<?php 
require_once 'session.php';
if(empty($_SESSION['hms']))
{
    header("location:login2.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once 'title.php'; ?>
</head>

<body>

<div id="wrapper">
	<?php require_once 'header.php'; ?>
    <?php require_once 'menu.php'; ?>
    <div id="content">
        <div id="contenttext">
            <h2>Checkout</h2><br>
            <table width="500" >
                <tr>
                    <td width="120">Nama</td>
                    <td width="5">:</td>
                    <td><?php echo $rowUser['nama']; ?></td>
                </tr> 
                <tr>
                    <td width="120">Alamat</td>
                    <td width="5">:</td>
                    <td><?php echo $rowUser['alamat']; ?></td>
                </tr> 
                <tr>
                    <td width="120">Email</td>
                    <td width="5">:</td>
                    <td><?php echo $rowUser['email']; ?></td>
                </tr>   
                <tr>
                    <td width="120">Telepon</td>
                    <td width="5">:</td>
                    <td><?php echo $rowUser['telepon']; ?></td>
                </tr> 
            </table>
            <br>
            <table width="700" border="1">
                <tr>
                    <td>Product Gambar</td>
                    <td>Nama</td>
                    <td>Jumlah Order</td>
                    <td>Harga Satuan</td>
                    <td>Sub Total</td>
                </tr>
                <?php 
                foreach ($_SESSION['myCart'] as $productId => $jmlOrder)
                {
                   $product=mysqli_query($con, "select * from product where product_id = '".$productId."'");
                   $rowProduct=mysqli_fetch_array($product);
                   ?>
                   <tr>
                        <td><img src="product/<?php echo $rowProduct['product_gambar'];?>" height="80"></td>
                        <td><?php echo $rowProduct['product_nama']; ?></td>
                        <td><?php echo $jmlOrder; ?></td>
                        <td><?php echo number_format($rowProduct['product_harga'], 0, ",", "."); ?></td>
                        <td>
                            <?php 
                                $subtotal=$jmlOrder*$rowProduct['product_harga'];
                                echo number_format($subtotal, 0, ",", ".");
                                //$grandtotal=$grandtotal+$subtotal;
                                @$grandtotal+=$subtotal;
                            ?>
                        </td>
                    </tr>
                   <?php
                }
                ?>
                <tr>
                    <td colspan="4" align="right"> Grand Total &nbsp;&nbsp;</td>
                    <td><?php echo number_format($grandtotal, 0, ",", "."); ?></td>
                </tr>
                <tr>
                    <td colspan="5" align="right">
                        <a href="proses_order.php">
                        <input type="button" name="proses_order" value="Proses Order" id="orderButton">
                        </a>
                    </td>
                </tr>
            </table>
            
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</div>
</body>
</html>
