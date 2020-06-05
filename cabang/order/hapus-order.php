<?php
// koneksi database
include '../../koneksi.php';

// menangkap data id yang di kirim dari url
session_start();
if ($_SESSION['status']!="cabang") {
    header("location:../index.php?pesan=belum_login");
} else {
    $id = $_GET['id'];
    $kode_order = $_GET['kode_order'];

    // menghapus data dari database
    mysqli_query($koneksi, "delete from t_order where id='$id' ");

    // mengalihkan halaman kembali ke index.php
    header("location:order.php?kode_order=$kode_order.php");
}
