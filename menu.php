<div id="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="product.php">Product</a></li>
        <?php 
        if(isset($_SESSION['hms']))
        {
        	?>
        	<li><a href="logout.php">Logout</a></li>
        	<?php
        }
        else
        {
        	?>
        	<li><a href="login.php">Login</a></li>
        	<?php
        }
        ?>
        <li><a href="register.php">Register</a></li>
    </ul>
</div>
