<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
// belum mengunakan MD5
$username = addslashes(trim($_POST['username']));
// $username = $_POST['username'];
$password = md5($_POST['password']);

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);


if ($cek > 0) {
    $login = mysqli_fetch_assoc($data);

    if ($login['level']=="admin") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "admin";
        header("location:admin/index.php");
    } elseif ($login['level']=="pusat") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "pusat";
        header("location:pusat/material/index.php");
    } elseif ($login['level']=="cabang") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "cabang";
        header("location:cabang/material/index.php");
    } else {
        echo "gagal1";
        // header("location:index.php?pesan=gagal1");
    }
} else {
    // echo "gagal2";

    header("location:index.php?pesan=gagal");
}
