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
            <h2>Order Sukses</h2><br>
            Terima kasih sudah melakukan order. Id Order anda : <?php echo $_GET['id'] ?>
            <br>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</div>
</body>
</html>
