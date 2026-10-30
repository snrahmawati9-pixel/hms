<?php 
require_once 'session.php';
if(isset($_GET['id']))
{
    $delete=mysqli_query($con, "delete from product where product_id = '".$_GET['id']."'");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="scripts/java.js"></script>
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
            <span>Data Product</span>
        </div>
        <div id="navigasi">
            <div id="add" align="left">
                <a href="add_product.php">
                <img src="images/add.png" height="20" />
                </a>
            </div>
            <div id="search" align="right">
                <form method="post" action="product.php?page=1">
                    <input type="text" name="keyword" id="keyword" value="<?php echo @$_POST['keyword'] ?>" />
                    &nbsp;&nbsp;
                    <input type="submit" name="submitSearch" value="Search" />
                </form>
            </div>
        </div>
        <div style="clear:both; height:20px;"></div>
            <div id="content_isi" align="center" style="clear:both; width:auto; overflow:auto; min-height:0;">
            <table class="dataField">
                <tr class="bgJudul judulData">
                    <td width="50"></td>
                    <td width="20">No</td>
                    <td width="120">Gambar</td>
                    <td>Product Id</td>
                    <td>Kategori</td>
                    <td>Nama</td>
                    <td>Harga</td>
                    <td>Stock</td>
                    <td>Status</td>
                </tr>
                <?php 
                $a=1;
                
                //$data=mysqli_query($con, "select * from product"); 
                if(empty($_GET['page']))
                {
                    $_GET['page']=1;
                }
 
                $hal=($_GET['page']*5)-5;
                $k = mysqli_real_escape_string($con, @$_REQUEST['keyword']);
                $where = "where a.product_nama like '%$k%' or a.product_id like '%$k%' or b.kategori_nama like '%$k%'";
                $data=mysqli_query($con, "select * from product a left join kategori b on a.kategori_id=b.kategori_id $where order by a.product_id desc limit $hal,5");
                
                while ($rowData=mysqli_fetch_array($data))
                {
                    if ($a%2 ==0)
                    {
                        $cssbg='genap';
                    }
                    else
                    {
                        $cssbg='ganjil';
                    }
                    ?>
                    <tr class="<?php echo $cssbg;?>">
                        <td>
                            <a href="edit_product.php?id=<?php echo $rowData['product_id']?>">
                                <img src="images/edit.gif" height="15">
                            </a>
                            &nbsp;&nbsp;
                            <img src="images/delete.gif" height="15" onclick="getDeleteProduct('<?php echo $rowData['product_id'];?>')" class="kursor">
                        </td>
                        <td><?php echo $a; ?></td>
                        <td>
                            <img src="../product/<?php echo $rowData['product_gambar']; ?>" width="100">
                            
                        </td>
                        <td>
                            <?php echo $rowData['product_id']; ?>
                        </td>
                        <td>
                            
                            <?php echo $rowData['kategori_nama']; ?>
                        </td>
                        <td>
                            <?php echo $rowData['product_nama']; ?>
                        </td>
                        <td>
                            <?php echo "Rp ".number_format($rowData['product_harga'], 0, ",", "."); ?>
                        </td>
                        <td>
                            <?php echo $rowData['product_stock']; ?>
                        </td>
                        <td>
                            <?php echo $rowData['product_status']; ?>
                        </td>
                    </tr>
                    <?php
                    $a++;
                }
                ?>
            </table>
            <?php 
            $getData=mysqli_query($con, "select * from product");
            $jmlData=mysqli_num_rows($getData);
            // round = pembulatan biasa
            // floor = pembulatan kebawah
            // ceil  = pembulatan keatas
            $jmlHal=ceil($jmlData/5);
            ?>
            <div id="page">
                <?php
                if($_GET['page']>1)
                {
                ?>
                    <a href="product.php?page=1">
                    <div class="page_border"> << </div>
                    </a>

                    <a href="product.php?page=<?php echo $_GET['page']-1;?>">
                    <div class="page_border"> < </div>
                    </a>
                <?php 
                }
    
                
                if($_GET['page']<$jmlHal)
                {
                ?>
                    <a href="product.php?page=<?php echo $_GET['page']+1;?>">
                    <div class="page_border"> > </div>
                    </a>

                    <a href="product.php?page=<?php echo $jmlHal;?>">
                    <div class="page_border"> >> </div>
                    </a>
                <?php 
                }
                ?>
            </div>
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