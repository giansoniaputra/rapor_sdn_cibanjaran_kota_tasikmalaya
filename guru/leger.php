<?php
include '../config/session-guru.php';
include "../config/view.php";
require_once ("../fpdf/fpdf.php");

$query = query("SELECT * FROM mapel");
$query3 = query("SELECT * FROM nilai_pengetahuan
                LEFT JOIN siswa ON nilai_pengetahuan.id_siswa = siswa.id_siswa
                LEFT JOIN mapel ON nilai_pengetahuan.id_mapel = mapel.id_mapel
                LIMIT 3
                ");
   
class PDF extends FPDF{
// Membuat Page header
    function Header(){
    // Menambahkan judul header
    $this->SetFont('Arial','B',13);
    $this->Cell(5);
    $this->Cell(90 ,0,'KUMPULAN NILAI KELAS '.$_SESSION["guru"].' 2021/2022',0,1,'C');
    $this->Ln();
    }
    // Membuat page footer
    function Footer(){

    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF('l','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

//Membuat kolom judul tabel
$pdf->SetFont('Arial','','8');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(0, 0, 0);

$pdf->SetXY(10,14);
$pdf->MultiCell(10, 40,'No.', 1, '0','C', true);
$pdf->SetXY(20,14);
$pdf->MultiCell(70, 40,'', 1, '0','C', true);


$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255, 255, 255);

$pdf->SetXY(23,18);
$pdf->MultiCell(40, 7,'NAMA PESERTA DIDIK'."\n".'Nomor Induk/ NISN'."\n".'Tempat Tanggal Lahir'."\n".'Nama Orang Tua'."\n".'Alamat', 1, '0','C', true);

$pdf->SetFont('Arial','','8');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(0, 0, 0);

$pdf->SetXY(80,14);
$pdf->MultiCell(10, 13.3,'Jenis Penilaian', 1, '0','C', true);
$pdf->SetXY(90,14);
$pdf->MultiCell(120, 7,'Mata Pelajaran', 1, '0','C', true);

$pdf->SetXY(210,14);
$pdf->MultiCell(30, 7,'Sikap', 1, '0','C', true);

$pdf->SetXY(240,14);
$pdf->MultiCell(30, 7,'Absensi', 1, '0','C', true);

$no = 17.1;
$lup = 1;

$pdf->SetFont('Arial','','5');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(0, 0, 0);

    foreach ($query as $row){
        if($row["nama_mapel"] == 'BAHASA INDONESIA'){
            $mepel = 'B.INDO';
        } else {
            $mapel = $row["nama_mapel"];
        }
        
$pdf->SetXY(73.1+$no*$lup,21);
$pdf->MultiCell(17.1, 21,$mapel, 1, '0','C', true);
$pdf->SetXY(73.1+$no*$lup,40);
$pdf->MultiCell(8.55, 7,'KKM', 1, '0','C', true);
$pdf->SetXY(81.65+$no*$lup,40);
$pdf->MultiCell(8.55, 7,'70', 1, '0','C', true);
$pdf->SetXY(73.1+$no*$lup,47);
$pdf->MultiCell(8.55, 7,'NP', 1, '0','C', true);
$pdf->SetXY(81.65+$no*$lup,47);
$pdf->MultiCell(8.55, 7,'NK', 1, '0','C', true);



$lup++;

}
    $no = 1;
    $no2 = 1;
    $y = 40;
    $y2 = 7;
    
    foreach($query3 as $row){
        $pdf->SetFont('Arial','','8');
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetXY(10,14+$y*$no);
        $pdf->MultiCell(10, 40,$no, 1, '0','C', true);

        $pdf->SetXY(20,14+$y*$no);
        $pdf->MultiCell(70, 40,'', 1, '0','C', true);

        $pdf->SetFont('Arial','','5');
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(255, 255, 255);

        $pdf->SetXY(23,18+$y*$no);
        $pdf->MultiCell(40, 7,$row["nama_lengkap"]."\n".$row["NIS"]."\n".$row["tempat_lahir"].', '.$row["tanggal_lahir"]."\n".$row["nama_ayah"]."\n".$row["alamat_siswa"], 1, '0','C', true);

        $pdf->SetFont('Arial','','8');
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0, 0, 0);

        $pdf->SetXY(80,14+$y*$no);
        $pdf->MultiCell(10, 9,'HPH', 1, '0','C', true);

        $pdf->SetXY(80,22+$y*$no);
        $pdf->MultiCell(10, 8,'HPTS', 1, '0','C', true);

        $pdf->SetXY(80,30+$y*$no);
        $pdf->MultiCell(10, 8,'HPAS', 1, '0','C', true);

        $pdf->SetXY(80,38+$y*$no);
        $pdf->MultiCell(10, 8,'HPA', 1, '0','C', true);

        $pdf->SetXY(80,46+$y*$no);
        $pdf->MultiCell(10, 8,'PRE', 1, '0','C', true);

        

    $no++;
        
    }

        

        








$pdf->Output('i','Laporan Transaksi GIAN CELLULAR.pdf','false');
?>