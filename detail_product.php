<?php 
require_once 'session.php';
if(isset($_POST['addCart']))
{
	$_SESSION['myCart'][$_GET['id']]=$_POST['jmlOrder'];
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
            <h2>Detail Product</h2><br>
            <?php 
            $data=mysqli_query($con, "select * from product where product_id='".$_GET['id']."'");
            $rowData=mysqli_fetch_array($data);
            ?>
            <div id="product_detail">
            	<div class="product_detail_box">
            		<img src="product/<?php echo $rowData['product_gambar']?>" width="430">
            	</div>
            	<div class="product_detail_box">
            		<table>
            			<tr>
            				<td width="100">Product Id</td>
            				<td width="5">:</td>
            				<td>
            					<?php echo $rowData['product_id']; ?>
            				</td>
            			</tr>
            			<tr>
            				<td>Nama</td>
            				<td>:</td>
            				<td>
            					<?php echo $rowData['product_nama']; ?>
            				</td>
            			</tr>
            			<tr>
            				<td>Deskripsi</td>
            				<td>:</td>
            				<td>
            					<?php echo $rowData['product_keterangan']; ?>
            				</td>
            			</tr>
            			<tr>
            				<td>Harga</td>
            				<td>:</td>
            				<td>
            					<?php echo "Rp ".number_format($rowData['product_harga'], 0, ",", "."); ?>
            				</td>
            			</tr>
            			<tr>
            				<td>Stock</td>
            				<td>:</td>
            				<td>
            					<?php echo $rowData['product_stock']; ?>
            				</td>
            			</tr>
            			<tr>
            				<td colspan="3" align="right">
            					<form action="#" method="post">
            					<select name="jmlOrder">
            						<?php
            						$start=1;
            						while($start<=$rowData['product_stock'])
            						{
            							?>
            							<option value="<?php echo $start;?>">
            								<?php echo $start; ?>
            							</option>
            							<?php
            							$start++;
            						}
            						?>
            					</select>
            					<input type="submit" name="addCart" value="Add to Cart" id="orderButton">
            					</form>
            				</td>
            			</tr>
            		</table>
            	</div>

            </div>
            
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</div>
</body>
</html>
