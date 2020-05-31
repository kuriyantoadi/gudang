<?php
session_start();
if ($_SESSION['status']!="pusat") {
    header("location:../../index.php?pesan=belum_login");
}


include '../koneksi.php';

$id = $_POST['id'];
$material_masuk = $_POST['material_masuk'];

$data = mysqli_query($koneksi, "SELECT * from gudang_pusat where id=$id");
$no =1;
while ($d = mysqli_fetch_array($data)) {
    $jumlah_material = $d['jumlah_material'];
}


$total_akhir = $jumlah_material+$material_masuk;
// echo $total_akhir;

mysqli_query($koneksi, "UPDATE gudang_pusat SET
             id='$id',
             jumlah_material='$total_akhir'
             where id='$id'
             ");

 header("location:data-material.php");
