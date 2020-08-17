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
$ekspedisi = $_POST['ekspedisi'];
$status = $_POST['status'];
$tgl_kirim = date('d-m-Y');
$nama_penerima = $_POST['nama_penerima'];
$warehouse = $_POST['warehouse'];
$devision = $_POST['devision'];
$origin_place = $_POST['origin_place'];
$destination = $_POST['destionation'];
$pj_waharehouse_pusat = $_POST['pj_warehouse_pusat'];
$pj_ekespedisi = $_POST['pj_ekspedisi'];
$pj_warehouse_cbg = $_POST['pj_warehouse_cbg'];
$driver = $_POST['driver'];
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
                status='$status',
                ekspedisi='$ekspedisi',
                tgl_kirim='$tgl_kirim',
                nama_penerima='$nama_penerima',
                warehouse='$warehouse',
                devision='$devision',
                origin_place='$origin_place',
                destionation='$destination',
                pj_warehouse_pusat='$pj_waharehouse_pusat',
                pj_ekspedisi='$pj_ekespedisi',
                pj_warehouse_cbg='$pj_warehouse_cbg',
                driver='$driver'

                 where id_material='$id_material' and kode_order='$kode_order'
              ")or die(mysqli_error($koneksi));

header("location:order-tampil.php?kode_order=$kode_order");
