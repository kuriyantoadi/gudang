<?php
session_start();
if ($_SESSION['status']!="cabang") {
    header("location:../../index.php?pesan=belum_login");
}


include '../../koneksi.php';

$id = $_POST['id'];
$id_material = $_POST['id_material'];
$nama_material = $_POST['nama_material'];
$jumlah_material = $_POST['jumlah_material'];
$jenis_satuan_material = $_POST['jenis_satuan_material'];


mysqli_query($koneksi, "UPDATE gudang_cabang SET
             id='$id',
             id_material='$id_material',
             nama_material='$nama_material',
             jumlah_material='$jumlah_material',
             jenis_satuan_material='$jenis_satuan_material'
             where id='$id'
             ");

 header("location:index.php");
