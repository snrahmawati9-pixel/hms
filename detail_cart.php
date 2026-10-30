<?php 
require_once 'session.php';

// Inisialisasi session myCart jika belum ada
if (!isset($_SESSION['myCart'])) {
    $_SESSION['myCart'] = [];
}

// Hapus item dari keranjang
if (isset($_GET['do']) && $_GET['do'] == 'hapus' && isset($_GET['id'])) {
    $productId = $_GET['id'];
    if (isset($_SESSION['myCart'][$productId])) {
        unset($_SESSION['myCart'][$productId]);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <?php require_once 'title.php'; ?>
</head>
<body>
<div id="wrapper">
    <?php require_once 'header.php'; ?>
    <?php require_once 'menu.php'; ?>
    <div id="content">
        <div id="contenttext">
            <h2>Detail Cart</h2><br>
            <table width="700" border="1">
                <tr>
                    <th width="20"></th>
                    <th>Product Gambar</th>
                    <th>Nama</th>
                    <th>Jumlah Order</th>
                    <th>Harga Satuan</th>
                    <th>Sub Total</th>
                </tr>
                <?php 
                $grandtotal = 0;

                // Pastikan myCart adalah array sebelum digunakan
                if (!empty($_SESSION['myCart']) && is_array($_SESSION['myCart'])) {
                    foreach ($_SESSION['myCart'] as $productId => $jmlOrder) {
                        // Bersihkan input ID produk untuk query SQL
                        $productIdEscaped = mysqli_real_escape_string($con, $productId);

                        // Ambil data produk dari database
                        $product = mysqli_query($con, "SELECT * FROM product WHERE product_id = '$productIdEscaped'");
                        if ($product && $rowProduct = mysqli_fetch_array($product)) {
                            ?>
                            <tr>
                                <td>
                                    <a href="detail_cart.php?do=hapus&id=<?php echo htmlspecialchars($productId); ?>">
                                        <img src="images/delete.gif" height="20" alt="Hapus">
                                    </a>
                                </td>
                                <td><img src="product/<?php echo htmlspecialchars($rowProduct['product_gambar']); ?>" height="80" alt="Gambar Produk"></td>
                                <td>
                                    <a href="detail_product.php?id=<?php echo htmlspecialchars($rowProduct['product_id']); ?>">
                                        <?php echo htmlspecialchars($rowProduct['product_nama']); ?>
                                    </a>
                                </td>
                                <td><?php echo intval($jmlOrder); ?></td>
                                <td><?php echo number_format($rowProduct['product_harga'], 0, ",", "."); ?></td>
                                <td>
                                    <?php 
                                    $subtotal = $jmlOrder * $rowProduct['product_harga'];
                                    echo number_format($subtotal, 0, ",", ".");
                                    $grandtotal += $subtotal;
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                } else {
                    echo '<tr><td colspan="6" align="center">Keranjang kosong.</td></tr>';
                }
                ?>
                <tr>
                    <td colspan="5" align="right">Grand Total&nbsp;&nbsp;</td>
                    <td><?php echo number_format($grandtotal, 0, ",", "."); ?></td>
                </tr>
                <tr>
                    <td colspan="6" align="right">
                        <a href="detail_checkout.php">
                            <input type="button" name="checkout" value="Checkout" id="orderButton">
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
