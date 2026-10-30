<?php 
session_start();
require_once 'koneksi.php';
if(isset($_POST['submitLogin']))
{
    if($_POST['email']=="")
    {
        $pesan='Email tidak boleh kosong';
    }
    else if($_POST['password']=='')
    {
        $pesan='Password tidak boleh kosong';
    }
    else
    {
        $data=mysqli_query($con, "select * from user where email = '".$_POST['email']."' and password ='".md5($_POST['password'])."'");
        if(mysqli_num_rows($data)==1)
        {
            $rowData=mysqli_fetch_array($data);
            if($rowData['status']=='active')
            {
                $_SESSION['hms']=$_POST['email'];
                $update=mysqli_query($con, "update user set session_id = '".session_id()."' where email='".$_POST['email']."'");
                if($rowData['type']=='administrator')
                {
                    header("location:admin/index.php");
                }
                else
                {
                    header("location:index.php");
                }
            }
            else
            {
                $pesan='User anda sudah tidak active';
            }
        }
        else
        {
            $pesan='Email / Password salah';
        }
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
            <h2>Login</h2><br>
            <form action="#" method="post">
                <table border="1" width="300">
                    <tr>
                        <td width="120">Email</td>
                        <td width="5">:</td>
                        <td>
                            <input type="text" name="email" value="<?php echo @$_POST['email']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>
                            <input type="password" name="password">
                        </td>
                    </tr>
                    <?php 
                    if(!empty($pesan))
                    {
                        ?>
                        <tr>
                            <td colspan="3" align="center">
                                <?php echo $pesan; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="3" align="center">
                            <input type="submit" name="submitLogin" value="Login">
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
