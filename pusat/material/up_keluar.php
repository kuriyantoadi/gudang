<?php
session_start();
if ($_SESSION['status']!="pusat") {
    header("location:../../index.php?pesan=belum_login");
}


include '../../koneksi.php';

$id = $_POST['id'];
$material_keluar = $_POST['material_keluar'];

//laporan

$id_material = $_POST['id_material'];
$nama_material = $_POST['nama_material'];
$jumlah_material = $_POST['jumlah_material'];
$jenis_satuan_material = $_POST['jenis_satuan_material'];
$status_barang = $_POST['status_barang'];
$tanggal = $_POST['tanggal'];
$pj_petugas = $_POST['pj_petugas'];
$pj_lapangan = $_POST['pj_lapangan'];

echo $status_barang;

mysqli_query($koneksi, "insert into lap_pusat values(
'',
'$id_material',
'$nama_material',
'$jumlah_material',
'$jenis_satuan_material',
'$status_barang',
'$tanggal',
'$pj_petugas',
'$pj_lapangan'

)");


$data = mysqli_query($koneksi, "SELECT * from gudang_pusat where id=$id");
$no =1;
while ($d = mysqli_fetch_array($data)) {
    $jumlah_material = $d['jumlah_material'];
}


$total_akhir = $jumlah_material-$material_keluar;
// echo $total_akhir;

mysqli_query($koneksi, "UPDATE gudang_pusat SET
             id='$id',
             jumlah_material='$total_akhir'
             where id='$id'
             ");

 header("location:index.php");
