<?php
session_start();
if ($_SESSION['status']!="cabang") {
    header("location:../../index.php?pesan=belum_login");
}


include '../../koneksi.php';

$id = $_POST['id'];
$material_masuk = $_POST['material_masuk'];

//laporan

$id_material = $_POST['id_material'];
$nama_material = $_POST['nama_material'];
$jumlah_material = $_POST['jumlah_material'];
$jenis_satuan_material = $_POST['jenis_satuan_material'];
$status_barang = $_POST['status_barang'];
$tanggal = $_POST['tanggal'];
$pj_petugas = $_POST['pj_petugas'];

echo $status_barang;

mysqli_query($koneksi, "insert into lap_cabang values(
'',
'$id_material',
'$nama_material',
'$jumlah_material',
'$jenis_satuan_material',
'$status_barang',
'$tanggal',
'$pj_petugas',
'-'

)");


$data = mysqli_query($koneksi, "SELECT * from gudang_cabang where id_material=$id_material");
$no =1;
while ($d = mysqli_fetch_array($data)) {
    $jumlah_material = $d['jumlah_material'];
}


$total_akhir = $jumlah_material+$material_masuk;
// echo $total_akhir;

mysqli_query($koneksi, "UPDATE gudang_cabang SET
             id_material='$id_material',
             jumlah_material='$total_akhir'
             where id_material='$id_material'
             ");

 mysqli_query($koneksi, "UPDATE lap_cabang SET
              id_material='$id_material',
              jumlah_material='$total_akhir'
              where id_material='$id_material'
              ");

 header("location:index.php");
