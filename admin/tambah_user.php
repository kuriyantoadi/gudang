
<?php
session_start();
if ($_SESSION['status']!="admin") {
    header("location:../../index.php?pesan=belum_login");
}


include '../koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

mysqli_query($koneksi, "insert into user values(
'',
'$username',
'$password',
'$level'

)");

 header("location:datauser.php");
 ?>
