<?php
session_start();
if ($_SESSION['status']!="pusat") {
    header("location:../../index.php?pesan=belum_login");
}


include '../../koneksi.php';

$kode_order = $_POST['kode_order'];
$id = $_POST['id'];
$jumlah_material  = $_POST['jumlah_material'];
// echo $kode_order;

mysqli_query($koneksi, "UPDATE t_order SET
             jumlah_material='$jumlah_material'
             where id='$id'
             ");


header("location:order.php?kode_order=$kode_order");
