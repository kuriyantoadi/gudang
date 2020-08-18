<?php
include '../../koneksi.php';


$cek_max = mysqli_query($koneksi, "SELECT max(id) FROM t_order");
while ($row = mysqli_fetch_assoc($cek_max)) {
    $max = $row['max(id)'];
    $no_urut = $max+1;
}

$kode_order =  sprintf("%05s", $no_urut);
// echo $kode_order;
$tanggal_order = date('d-m-Y');
mysqli_query($koneksi, "insert into t_order (kode_order, tanggal_order) values('$kode_order','$tanggal_order')");

header("location:order.php?kode_order=$kode_order");
