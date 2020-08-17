<?php
if(isset($_POST["pdf"])){
include('koneksi.php');
require('plugins/fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');// change according timezone

$currentTime = date( 'd-m-Y h:i:s A', time () );


$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(0.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Image('img/Harfa.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(23.5,0.7,'LAZ HARFA BANTEN',0,'C');
$pdf->SetX(4);
$pdf->MultiCell(23.5,0.7,'Lembaga Amil Zakat Harapan Duafah, Banten.',0,'C');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(23.5,0.5,'Jl. Ciwaru 1 Komplek Pondok Citra,No. 1b, Kelurahan Cipare, Kecamatan Serang, Kota Serang, Banten',0,'C');
$pdf->SetX(4);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(31,0.7,"Laporan Rapat Harian",0,10,'C');
$pdf->ln(1);
//$pdf->Cell(5,0.7,"Printed On : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Id Material', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Nama Material', 1, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Jumlah Material', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Satuan', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'status', 1, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(3.5, 0.8, 'PJ Petugas', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'PJ Lapangan', 1, 1, 'C');

$pdf->SetFont('Arial','',9);
$no=1;

$from=$_POST['dari'];
$end=$_POST['sampai'];
$query=mysqli_query($koneksi,"select id_material, nama_material, jumlah_material, jenis_satuan_material,
status_barang, tanggal, pj_petugas, pj_lapangan
from lap_pusat WHERE (tanggal BETWEEN '$from' AND '$end')");
while($d=mysqli_fetch_array($query)){

	$pdf->SetFillColor(224,235,255);
    $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
    $pdf->Cell(3, 0.8, $d['id_material'], 1, 0,'C',true);
    $pdf->Cell(2.5, 0.8, $d['nama_material'],1, 0, 'C');
    $pdf->Cell(3.5, 0.8, $d['jumlah_material'], 1, 0,'C',true);
    $pdf->Cell(2.5, 0.8, $d['jenis_satuan_material'],1, 0, 'C');
    $pdf->Cell(2.5, 0.8, $d['status_barang'],1, 0, 'C',true);
    $pdf->Cell(3.5, 0.8, $d['tanggal'],1, 0, 'C');
    $pdf->Cell(3.5, 0.8, $d['pj_petugas'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $d['pj_lapangan'], 1, 1,'C',true);
    

	$no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40.5,0.7,"Approve",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"TUTORIALSWB & TUTORPHPID",0,10,'C');

$pdf->Output("laporan_buku.pdf","I");
}
?>