<?php
session_start();
if ($_SESSION['status']!="pusat") {
    header("location:../../index.php?pesan=belum_login");
}


include '../koneksi.php';

// $peminum = $_POST['peminum'];
$id_barang = $_POST['id_barang'];
$barang_keluar = $_POST['barang_keluar'];

$data = mysqli_query($koneksi, "SELECT * from barang_pusat");
$no =1;
while ($d = mysqli_fetch_array($data)) {
    $jml_awal = $d['jumlah_stok'];
}

// echo $jml_awal;
// echo $barang_masuk;
$total_akhir = $jml_awal-$barang_keluar;
// echo $total_akhir;

mysqli_query($koneksi, "UPDATE barang_pusat SET
             id_barang='$id_barang',
             jumlah_stok='$total_akhir'
             where id_barang='$id_barang'
             ");

 header("location:index.php");
