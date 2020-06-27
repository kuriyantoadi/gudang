<?php
session_start();
if ($_SESSION['status']!="admin") {
    header("location:../../index.php?pesan=belum_login");
}


include '../koneksi.php';

$id = $_POST['id'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];


mysqli_query($koneksi, "UPDATE user SET
             id='$id',
             username='$username',
             password='$password',
             level='$level'
             where id='$id'
             ");

 header("location:datauser.php");
