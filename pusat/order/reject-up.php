<?php
session_start();
if ($_SESSION['status']!="pusat") {
    header("location:../../index.php?pesan=belum_login");
}


include '../../koneksi.php';

$id_material = $_GET['id_material'];
$kode_order = $_GET['kode_order'];


mysqli_query($koneksi, "UPDATE t_order SET
                status='reject' where id_material='$id_material' and kode_order='$kode_order'
              ")or die(mysqli_error($koneksi));

header("location:order-tampil.php?kode_order=$kode_order");
