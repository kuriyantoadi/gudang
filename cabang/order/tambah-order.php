<?php
session_start();
if ($_SESSION['status']!="cabang") {
    header("location:../../index.php?pesan=belum_login");
}


include '../../koneksi.php';

$id_material = $_GET['id_material'];

$data = mysqli_query($koneksi, "select * from gudang_pusat where id_material='$id_material'");
while ($d = mysqli_fetch_array($data)) {
    $t_nama_material = $row['nama_material'];
    $t_id_material = $row['id_material'];
}



 header("location:data-material.php");
