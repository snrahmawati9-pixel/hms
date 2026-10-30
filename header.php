<a href="detail_cart.php">
    <div id="cart">
        <?php 
        // Periksa apakah $_SESSION['myCart'] ada dan merupakan array
        $cartCount = isset($_SESSION['myCart']) && is_array($_SESSION['myCart']) ? count($_SESSION['myCart']) : 0;
        echo "($cartCount) Items"; 
        ?>
    </div>
</a>

<a href="index.php">
    <div id="header">
        <?php 
        // Periksa apakah session 'hms' ada (menandakan pengguna telah login)
        if (isset($_SESSION['hms'])) {
            // Menampilkan nama pengguna jika sudah login
            ?>
            <div id="welcome">
                <?php echo "Welcome, " . htmlspecialchars($rowUser['nama']); ?>
            </div>
            <?php
        }
        ?>
    </div>
</a>
