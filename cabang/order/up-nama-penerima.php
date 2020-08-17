<?php
session_start();
if ($_SESSION['status']!="cabang") {
    header("location:../../index.php?pesan=belum_login");
}


include '../../koneksi.php';

$id_material = $_POST['id_material'];
$kode_order = $_POST['kode_order'];
$nama_material = $_POST['nama_material'];
$nama_penerima = $_POST['nama_penerima'];
$tgl_terima = date('d-m-Y');

mysqli_query($koneksi, "UPDATE t_order SET
             nama_penerima='$nama_penerima',
             tgl_terima='$tgl_terima'
             where kode_order='$kode_order' and id_material='$id_material'
             ");

 header("location:order-terima.php?kode_order=$kode_order");
