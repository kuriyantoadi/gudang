<?php
session_start();
if ($_SESSION['status']!="pusat") {
    header("location:../../index.php?pesan=belum_login");
}


include '../../koneksi.php';

$kode_order = $_POST['kode_order'];

$id_material = $_POST['id_material'];
$nama_material = $_POST['nama_material'];
$jumlah_material = $_POST['jumlah_material'];
$kondisi =  $_POST['kondisi'];
$status = $_POST['status'];
// echo $kode_order;

$data = mysqli_query($koneksi, "SELECT id_material, jumlah_material from gudang_pusat where id_material='$id_material' ");
while ($d = mysqli_fetch_array($data)) {
    $cek_material = $d['jumlah_material'];
}

$acc_material = $cek_material - $jumlah_material;
echo $acc_material;
echo "<br>";
echo $id_material;

$cek = mysqli_query($koneksi, "UPDATE gudang_pusat SET
             jumlah_material='$acc_material'
             where id_material='$id_material'
             ") or die(mysqli_error($koneksi));

mysqli_query($koneksi, "UPDATE t_order SET
                kondisi='$kondisi',
                status='$status' where id_material='$id_material' and kode_order='$kode_order'
              ")or die(mysqli_error($koneksi));

header("location:order.php?kode_order=$kode_order");
