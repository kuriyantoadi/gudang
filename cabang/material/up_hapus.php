<?php
// koneksi database
include '../../koneksi.php';

// menangkap data id yang di kirim dari url
session_start();
if ($_SESSION['status']!="cabang") {
    header("location:../index.php?pesan=belum_login");
} else {
    $id = $_GET['id'];

    // menghapus data dari database
    mysqli_query($koneksi, "delete from gudang_cabang where id='$id' ");

    // mengalihkan halaman kembali ke index.php
    header("location:index.php");
}
