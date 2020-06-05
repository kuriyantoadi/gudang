<?php
// koneksi database
include '../../koneksi.php';
$kode_order = $_GET['kode_order'];
$id = $_GET['id'];

// menangkap data id yang di kirim dari url
session_start();
if ($_SESSION['status']!="cabang") {
    header("location:../index.php?pesan=belum_login");
} else {

    // menghapus data dari database
    mysqli_query($koneksi, "delete from t_order where id='$id' ");
    // mengalihkan halaman kembali ke index.php
}

header("location:order.php?kode_order=$kode_order");
