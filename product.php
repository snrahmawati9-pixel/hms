<?php 
require_once 'session.php';
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
            <h2>Product</h2><br>
            <?php 
            $data=mysqli_query($con, "select * from product where product_stock>=1");
            while($rowData=mysqli_fetch_array($data))
            {
            	?>
                <a href="detail_product.php?id=<?= $rowData['product_id'];?>">
            	<div class="listProduct">
	            	<div class="productPicture">
	            		<img src="product/<?php echo $rowData['product_gambar'];?>" height="180" width="200">
	            	</div>
	            	<div class="productTitle"><?php echo $rowData['product_nama']; ?></div>
	            	<div class="productPrice"><?php echo "Rp ".number_format($rowData['product_harga'], 0, ",", "."); ?></div>
	            </div>
                </a>
            	<?php
            }
            ?>

        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</div>
</body>
</html>
