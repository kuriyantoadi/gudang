<?php
if(isset($_POST["pdf"])){
include('koneksi.php');
require('plugins/fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');// change according timezone

$currentTime = date( 'd-m-Y');

$query_head=mysqli_query($koneksi,"SELECT td.*, b.jenis_satuan_material
FROM t_order as td, gudang_pusat as b WHERE b.id_material=td.id_material AND ( tgl_kirim BETWEEN '$tglawal' and '$tglakhir')");
while($lihat=mysqli_fetch_array($query)){


$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->SetFont('Arial','B',14);
//$pdf->Image('img/Harfa.png',1,1,2,2);
//$pdf->SetX(4);
//$pdf->MultiCell(23.5,0.7,'LAZ HARFA BANTEN',0,'C');
//$pdf->SetX(4);
//$pdf->MultiCell(23.5,0.7,'Lembaga Amil Zakat Harapan Duafah, Banten.',0,'C');
//$pdf->SetFont('Arial','B',10);
//$pdf->SetX(4);
//$pdf->MultiCell(23.5,0.5,'Jl. Ciwaru 1 Komplek Pondok Citra,No. 1b, Kelurahan Cipare, Kecamatan Serang, Kota Serang, Banten',0,'C');
//$pdf->SetX(4);
//$pdf->Line(1,3.1,28.5,3.1);
//$pdf->SetLineWidth(0.1);
//$pdf->Line(1,3.2,28.5,3.2);
//$pdf->SetLineWidth(0);
$query_atas=mysqli_query($koneksi,"SELECT td.*, b.jenis_satuan_material
FROM t_order as td, gudang_pusat as b WHERE b.id_material=td.id_material AND ( tgl_kirim BETWEEN '$tglawal' and '$tglakhir')");
while($d=mysqli_fetch_array($query_atas)){

$pdf->ln();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(27,0.7,"Delivery Note",0,9,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','',14);
$pdf->Cell(5.3,0.7,"Delivery Note Number : $lihat['id_material']  ",0,0,'C');
$pdf->Cell(26,0.7,"Warehouse :  ",0,0,'C');
$pdf->ln(1);
$pdf->Cell(3.8,0.7,"Date : $currentTime",0,0,'C');
$pdf->Cell(29.8,0.7,"Division/Project :  ",0,0,'C');
$pdf->ln(1);
$pdf->Cell(36.6,0.7,"Po Number :  ",0,0,'C');
$pdf->ln(1);
$pdf->Cell(36.7,0.7,"Origin Place :  ",0,0,'C');
$pdf->ln(1);
$pdf->Cell(36.6,0.7,"Destination :  ",0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Id Material', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Material', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Qty', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Satuan', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Status', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Kondisi', 1, 0, 'C');
//$pdf->Cell(3, 0.8, 'Total harga', 1, 0, 'C');
//$pdf->Cell(3, 0.8, 'Keuntungan', 1, 1, 'C');
}
//ambil paramater tanggal GET/POST
$tglawal = $_POST['dari']; //penamaan disesuaikan
$tglakhir = $_POST['sampai']; //penamaan disesuaikan

$no=1;
$query=mysqli_query($koneksi,"SELECT td.*, b.jenis_satuan_material
FROM t_order as td, gudang_pusat as b WHERE b.id_material=td.id_material AND ( tgl_kirim BETWEEN '$tglawal' and '$tglakhir')");

while($lihat=mysqli_fetch_array($query)){

    $pdf->ln();
    $pdf->Cell(1, 0.8, $no , 1, 0, 'C');
    $pdf->Cell(3, 0.8, $lihat['id_material'],1, 0, 'C');
    $pdf->Cell(5, 0.8, $lihat['nama_material'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $lihat['jumlah_material'],1, 0, 'C');
    $pdf->Cell(4, 0.8, $lihat['jenis_satuan_material'], 1, 0,'C');
    $pdf->Cell(5, 0.8, $lihat['status'], 1, 0,'C');
    $pdf->Cell(6, 0.8, $lihat['kondisi'], 1, 0,'C');
    //$pdf->Cell(3, 0.8, "Rp. ".number_format($lihat['harga'])." ,-", 1, 0,'C');
    //$pdf->Cell(3, 0.8, "Rp. ".number_format($lihat['total_harga'])." ,-",1, 0, 'C');
    //$pdf->Cell(3, 0.8, "Rp. ".number_format($lihat['laba'])." ,-", 1, 1,'C');
    $no++;


}




//$pdf->ln(3.);
//$pdf->SetFont('Arial','B',12);
//$pdf->Cell(6,0.7,"Approve",0,10,'C');

//$pdf->ln(1.8);
//$pdf->SetFont('Arial','B',11);
//$pdf->Cell(6,0.7,"Ahmad Ardiansyah",0,10,'C');

$pdf->ln(4);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(6, 0.7, 'Pj Warehose Jakarta', 0, 0, 'C');
$pdf->Cell(6, 0.7, 'Pj Ekspedisi', 0, 0, 'C');
$pdf->Cell(9, 0.7, 'Pj_Warhouse Cabang', 0, 0, 'C');
$pdf->Cell(6, 0.7, 'Driver', 0, 0, 'C');



$pdf->ln(3);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(6, 0.7, 'Kuryanto', 0, 0, 'C');
$pdf->Cell(6, 0.7, 'Hanif Nurmajid', 0, 0, 'C');
$pdf->Cell(9, 0.7, 'Ahmad Ardiansyah', 0, 0, 'C');
$pdf->Cell(6, 0.7, 'Putra Siapa', 0, 0, 'C');



$pdf->Output("laporan_buku.pdf","I");
}
?>
