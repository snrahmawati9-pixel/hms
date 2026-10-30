<?php
//cek tombol sudah di klik atau belum
if(isset($_POST['submitRegister']))
{
    //koneksi
    require_once 'koneksi.php';

    //cek ke table user apakah sudah ada email yg diinput atau tidak
    $cekEmail=mysqli_query($con,"select * from user where email='".$_POST['email']."'");
    if(mysqli_num_rows($cekEmail)==0)
    {
        //email belum ada di table user
        
        //insert data
        $insert=mysqli_query($con, "insert into user (email, nama, password, alamat, telepon, type, status) values ('".$_POST['email']."','".$_POST['nama']."', '".md5($_POST['password'])."', '".$_POST['alamat']."','".$_POST['telepon']."','member', 'active')");

        if($insert==true)
        {
            $pesan='Register berhasil. Silahkan login';
        }
        else
        {
            $pesan='Register gagal. Silahkan hubungi Administrator ';
        }
    }
    else
    {
        //email sudah ada di table user
        $pesan='Email sudah pernah terdaftar';
    }
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
            <h2>Register</h2><br>
            <form action="#" method="post">
                <table border="1" width="350">
                    <tr>
                        <td width="120">Email</td>
                        <td width="5">:</td>
                        <td>
                            <input type="text" name="email">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="nama"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input type="Password" name="password"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                            <textarea name="alamat"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td><input type="text" name="telepon"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <?php echo @$pesan; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <input type="submit" name="submitRegister" value="Register">
                            &nbsp;&nbsp;
                            <input type="reset" name="reset" value="Reset">
                        </td>
                    </tr>
                </table>
            </form>
            <br>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</div>
</body>
</html>
