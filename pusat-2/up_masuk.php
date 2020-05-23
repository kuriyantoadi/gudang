<?php
session_start();
if ($_SESSION['status']!="pusat") {
    header("location:../../index.php?pesan=belum_login");
}


include '../koneksi.php';

$id_barang = $_POST['id_barang'];
$barang_masuk = $_POST['barang_masuk'];

echo $id_barang;
$data = mysqli_query($koneksi, "SELECT * from barang_pusat where id_barang=$id_barang");
$no =1;
while ($d = mysqli_fetch_array($data)) {
    $jml_awal = $d['jumlah_stok'];
}
// echo "jml awal";
// echo $jml_awal;
// echo "barang masuk";
//  echo $barang_masuk;
// // echo "nama barang";
$total_akhir = $jml_awal+$barang_masuk;
// echo $total_akhir;

mysqli_query($koneksi, "UPDATE barang_pusat SET
             id_barang='$id_barang',
             jumlah_stok='$total_akhir'
             where id_barang='$id_barang'
             ");

 header("location:barang_masuk.php");
