<?php
session_start();
if ($_SESSION['status']!="pusat") {
    header("location:../../index.php?pesan=belum_login");
}


include '../../koneksi.php';

$id_material = $_POST['id_material'];
$nama_material = $_POST['nama_material'];
$jumlah_material = $_POST['jumlah_material'];
$jenis_satuan_material = $_POST['jenis_satuan_material'];

mysqli_query($koneksi, "insert into gudang_pusat values(
'',
'$id_material',
'$nama_material',
'$jumlah_material',
'$jenis_satuan_material'

)");

 header("location:index.php");
