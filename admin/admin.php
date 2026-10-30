<?php 
require_once 'session.php';
if(isset($_GET['id']))
{
    $delete=mysqli_query($con, "delete from user where email = '".$_GET['id']."'");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="scripts/java.js"></script>
</head>

<body id="menu3">

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
            <span>Data Admin</span>
        </div>
        <div id="navigasi">
            <div id="add" align="left">
                <a href="add_admin.php">
                <img src="images/add.png" height="20" />
                </a>
            </div>
            <div id="search" align="right">
                <form method="post" action="#">
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
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Status</td>
                </tr>
                <?php 
                $a=1;
                if(isset($_POST['submitSearch']))
                {
                    //search data
                    $data=mysqli_query($con, "select * from user where type = 'administrator' and (nama like '%".$_POST['keyword']."%' or email like '%".$_POST['keyword']."%')");
                }
                else
                {
                    $data=mysqli_query($con, "select * from user where type = 'administrator'"); 
                }
                
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
                            <a href="edit_admin.php?id=<?php echo $rowData['email']?>">
                                <img src="images/edit.gif" height="15">
                            </a>
                            &nbsp;&nbsp;
                            <img src="images/delete.gif" height="15" onclick="getDelete('<?php echo $rowData['email'];?>')" class="kursor">
                        </td>
                        <td><?php echo $a; ?></td>
                        <td>
                            <a href="data_admin.php?id=<?php echo $rowData['email']?>">
                            <?php echo ucwords($rowData['nama']); ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $rowData['email']; ?>
                        </td>
                        <td>
                            <?php echo strtoupper($rowData['status']); ?>
                        </td>
                    </tr>
                    <?php
                    $a++;
                }
                ?>
            </table>
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