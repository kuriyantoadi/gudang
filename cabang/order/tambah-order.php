<?php
session_start();
if ($_SESSION['status']!="cabang") {
    header("location:../../index.php?pesan=belum_login");
}


include '../../koneksi.php';

$id_material = $_GET['id_material'];
$kode_order = $_GET['kode_order'];
$tanggal_order = date('d-m-Y');

// echo $id_material;
// echo $kode_order;


$data = mysqli_query($koneksi, "select id_material, nama_material from gudang_cabang where id_material='$id_material'");
while ($d = mysqli_fetch_array($data)) {
    $t_nama_material = $d['nama_material'];
    $t_id_material = $d['id_material'];
}


mysqli_query($koneksi, "insert into t_order (kode_order, tanggal_order, id_material, nama_material)
values('$kode_order','$tanggal_order','$t_id_material','$t_nama_material')");



 header("location:order.php?kode_order=$kode_order");
