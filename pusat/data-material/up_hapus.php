<?php
// koneksi database
include '../../koneksi.php';

// menangkap data id yang di kirim dari url
session_start();
if ($_SESSION['status']!="pusat") {
    header("location:../index.php?pesan=belum_login");
} else {
    $id = $_GET['id'];

    // menghapus data dari database
    mysqli_query($koneksi, "delete from gudang_pusat where id='$id' ");

    // mengalihkan halaman kembali ke index.php
    header("location:data-material.php");
}
