<?php 
require_once 'session.php';

//cek transaksi_id terakhir

$getLastId=mysqli_query($con, "select * from transaksi order by transaksi_id desc");
if(mysqli_num_rows($getLastId)==0)
{
    $id='T1001';
}
else
{
    //sudah ada data
    $rowGetLastId=mysqli_fetch_array($getLastId);
    $getId=substr($rowGetLastId['transaksi_id'],-4)+1;
    $id='T'.$getId;
}

$insert=mysqli_query($con, "insert into transaksi (transaksi_id, email, transaksi_tanggal_order, transaksi_status) values ('".$id."', '".$_SESSION['hms']."','".date("Y-m-d")."', 'pending')");
if($insert==true)
{
	foreach ($_SESSION['myCart'] as $productId => $jmlOrder)
	{
		$product=mysqli_query($con, "select * from product where product_id='".$productId."'");
		$rowProduct=mysqli_fetch_array($product);

		if($rowProduct['product_stock']!=0)
		{
			if($rowProduct['product_stock']<$jmlOrder)
			{
				$jmlOrder=$rowProduct['product_stock'];
			}

			$insertDetail=mysqli_query($con, "insert into transaksi_detail (transaksi_id, product_id, transaksi_detail_qty, transaksi_detail_harga) values ('".$id."','".$productId."', '".$jmlOrder."','".$rowProduct['product_harga']."')");

			$stockAkhir=$rowProduct['product_stock']-$jmlOrder;

			$updateStock=mysqli_query($con, "update product set product_stock = '".$stockAkhir."' where product_id='".$productId."'");
		}
	}
	unset($_SESSION['myCart']);
	header("location:confirm_order.php?id=".$id);
}
else
{
	$pesan='error';
}
    
?>