<?php
include '../config/session-guru.php';
include "../config/view.php";
require_once ("../fpdf/fpdf.php");
    //Data Siswa
$query = query("SELECT * FROM siswa WHERE id_siswa = $_POST[id_siswa] AND kelas = $_SESSION[guru] ");
    
    //Data Nilai Pengetahuan 1-4
$query2 = query("SELECT * FROM nilai_pengetahuan RIGHT JOIN mapel ON nilai_pengetahuan.id_mapel = mapel.id_mapel WHERE  id_siswa = $_POST[id_siswa] LIMIT 4");

    //Data Nilai Keterampilan 1-4
$query3 = query("SELECT * FROM nilai_keterampilan RIGHT JOIN mapel ON nilai_keterampilan.id_mapel = mapel.id_mapel WHERE  id_siswa = $_POST[id_siswa]  ORDER BY id_nilai ASC LIMIT 4");

    //Data Nilai Pengetahuan 3-7
$query4 = query("SELECT * FROM nilai_pengetahuan RIGHT JOIN mapel ON nilai_pengetahuan.id_mapel = mapel.id_mapel WHERE  id_siswa = $_POST[id_siswa] ORDER BY id_nilai DESC   LIMIT 3");

    //Data Nilai Keterampilan 3-7
$query5 = query("SELECT * FROM nilai_keterampilan RIGHT JOIN mapel ON nilai_keterampilan.id_mapel = mapel.id_mapel WHERE  id_siswa = $_POST[id_siswa]  ORDER BY id_nilai DESC LIMIT 3");

    //Query Prestasi
$query6 = query("SELECT * FROM prestasi WHERE id_siswa = $_POST[id_siswa]");

    //Kakulasi Absen Hadir
$sum = query("SELECT count(kehadiran) as hadir FROM absen_siswa WHERE id_siswa = $_POST[id_siswa] AND kehadiran = 'H' AND tanggal >='$_POST[tanggal_awal]' AND tanggal<='$_POST[tanggal_akhir]'");

    //Kakulasi Absen Izim
$sum2 = query("SELECT count(kehadiran) as izin FROM absen_siswa WHERE id_siswa = $_POST[id_siswa] AND kehadiran = 'I' AND tanggal >='$_POST[tanggal_awal]' AND tanggal<='$_POST[tanggal_akhir]'");

    //Kakulasi Absen Alfa
$sum3 = query("SELECT count(kehadiran) as alfa FROM absen_siswa WHERE id_siswa = $_POST[id_siswa] AND kehadiran = 'A' AND tanggal >='$_POST[tanggal_awal]' AND tanggal<='$_POST[tanggal_akhir]'");

$nilai = 'Baik dalam ketaatan beribadah, berperilaku syukur, berdoa sebelum dan sesudah berkegiatan, toleransi beragama';
$social = 'Baik dalam bersikap jujur, disiplin, percaya diri, santun dan peduli';
   
class PDF extends FPDF{
// Membuat Page header
    function Header(){
    // Menambahkan judul header
    $this->SetFont('Arial','B',13);
    $this->Cell(30);
    $this->Cell(140,5,'RAPOR PESERTA DIDIK DAN PROFIL PESERTA DIDIK',0,1,'C');
    $this->Ln();
    }
    // Membuat page footer
    function Footer(){

    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

//Membuat kolom judul tabel
$pdf->SetFont('Arial','','8');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255, 255, 255);
foreach ( $query as $row){
    $pdf->Cell(27, 7, 'Nama', 1, '0','L', true);
    $pdf->Cell(72, 7, ': '.$row["nama_lengkap"], 1, '0','L', true);
    $pdf->Cell(27, 7, 'Kelas', 1, '0','L', true);
    $pdf->Cell(72, 7, ': '.$row["kelas"], 1, '0','L', true);
        $pdf->Ln();
    $pdf->Cell(27, 7, 'NISN', 1, '0','L', true);
    $pdf->Cell(72, 7, ': '.$row["NISN"], 1, '0','L', true);
    $pdf->Cell(27, 7, 'Semester', 1, '0','L', true);
    $pdf->Cell(72, 7, ': '.$_POST["semester"], 1, '0','L', true);
        $pdf->Ln();
    $pdf->Cell(27, 7, 'Nama Sekolah', 1, '0','L', true);
    $pdf->Cell(72, 7, ': SD NEGERI CIBANJARAN', 1, '0','L', true);
    $pdf->Cell(27, 7, 'Tahun Ajaran', 1, '0','L', true);
    $pdf->Cell(72, 7, ': 2020/2021', 1, '0','L', true);
        $pdf->Ln();
    $pdf->Cell(27, 7, 'Alamat Sekolah', 1, '0','L', true);
    $pdf->MultiCell(72, 7, ': Jl. AH. Nasution Km 8 Kel. Cipari Kec. Mangkubumi Kota Tasikmalaya', 1, '0','L', true);
    
}

    $pdf->SetFont('Arial','B','9');
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(255, 255, 255);

    $pdf->Cell(27, 7, 'A. Kompetensi Sikap', 1, '0','L', true);
    $pdf->Ln();
    $pdf->SetFont('Arial','B','8');
    $pdf->SetFillColor(192,192,192);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->Cell(190, 7, 'Deskripsi', 1, '0','C', true);
    $pdf->Ln();


    $pdf->SetFont('Arial','','9');
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->MultiCell(27, 14,'Sikap Spiritual', 1 ,'C', true);
    $pdf->SetXY(37,69);
    $pdf->MultiCell(163, 7, $nilai, 1,'L', true);
    $pdf->MultiCell(27, 14,'Sikap Sosial', 1 ,'C', true);
    $pdf->SetXY(37,83);
    $pdf->MultiCell(163, 14, $social, 1,'L', true);
    $pdf->Ln(2);

    $pdf->SetFont('Arial','B','9');
    $pdf->SetTextColor(0,0,0);

    $pdf->Cell(40, 7, 'B. Kompetensi Pengetahuan dan Keterampilan', 0, '0','L', true);
    $pdf->Ln();
    $pdf->Cell(80, 7, 'KKM Satuan Pendidikan', 0, '0','L', true);
    $pdf->Ln();
        //Heder
    $pdf->SetFont('Arial','B','8');
    $pdf->SetFillColor(192,192,192);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetXY(10,113);
    $pdf->MultiCell(8, 14, 'No', 1, '0','C', true);

    $pdf->SetXY(18,113);
    $pdf->MultiCell(50, 14, 'Muatan Pelajaran', 1, '0','C', true);

    $pdf->SetXY(68,113);
    $pdf->MultiCell(70, 7, 'Pengetahuan', 1, '0','C', true);

    $pdf->SetXY(130,113);
    $pdf->MultiCell(70, 7, 'Keterampilan', 1, '0','C', true);

    $pdf->SetXY(68,120);
    $pdf->MultiCell(10, 7, 'Nilai', 1, '0','C', true);

    $pdf->SetXY(78,120);
    $pdf->MultiCell(14, 7, 'Predikat', 1, '0','C', true);

    $pdf->SetXY(92,120);
    $pdf->MultiCell(38, 7, 'Deskripsi', 1, '0','C', true);

    $pdf->SetXY(130,120);
    $pdf->MultiCell(10, 7, 'Nilai', 1, '0','C', true);

    $pdf->SetXY(140,120);
    $pdf->MultiCell(14, 7, 'Predikat', 1, '0','C', true);

    $pdf->SetXY(154,120);
    $pdf->MultiCell(46, 7, 'Deskripsi', 1, '0','C', true);
    
    $no = 1;
    $y = 32;
        //Content

    $pdf->SetFont('Arial','B','8');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(0,0,0);
        foreach ($query2 as $row){
            foreach ($query3 as $row2){
    $pdf->SetXY(10,95+$y*$no);
    $pdf->MultiCell(8, 32, $no, 1, '0','C', true);
    $pdf->SetXY(18,95+$y*$no);
    $pdf->MultiCell(50, 32, $row["nama_mapel"], 1, '0','C', true);
    $pdf->SetXY(68,95+$y*$no);
    $pdf->MultiCell(10, 32, $row["HPA"], 1, '0','C', true);
    $pdf->SetXY(78,95+$y*$no);
    $pdf->MultiCell(14, 32, $row["PRE"], 1, '0','C', true);
    $pdf->SetXY(92,95+$y*$no);
    $pdf->MultiCell(38, 32, $row["deskripsi"], 1, '0','C', true);
    $pdf->SetXY(130,95+$y*$no);
    $pdf->MultiCell(10, 32, $row2["HPA"], 1, '0','C', true);  
    $pdf->SetXY(140,95+$y*$no);
    $pdf->MultiCell(14, 32, $row2["PRE"], 1, '0','C', true);
    $pdf->SetXY(154,95+$y*$no);
    $pdf->MultiCell(46, 32, $row2["deskripsi"], 1, '0','C', true);
            }
            $no++;
        }
    
    $x2 = 1;
    $no2 = 5;
    $y2 = 32;

    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B','8');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(0,0,0);
        foreach ( $query4 as $row){
            foreach ( $query5 as $row2){
    $pdf->SetXY(10,-13+$y2*$x2); 
    $pdf->MultiCell(8, 32, $no2, 1, '0','L', true);
    $pdf->SetXY(18,-13+$y2*$x2); 
    $pdf->MultiCell(50, 32,$row["nama_mapel"], 1, '0','L', true);
    $pdf->SetXY(68,-13+$y2*$x2); 
    $pdf->MultiCell(10, 32,$row["HPA"], 1, '0','L', true);
    $pdf->SetXY(78,-13+$y2*$x2); 
    $pdf->MultiCell(14, 32,$row["PRE"], 1, '0','L', true);
    $pdf->SetXY(92,-13+$y2*$x2); 
    $pdf->MultiCell(38, 32,$row["deskripsi"], 1, '0','L', true);
    $pdf->SetXY(130,-13+$y2*$x2);
    $pdf->MultiCell(10, 32, $row2["HPA"], 1, '0','C', true);  
    $pdf->SetXY(140,-13+$y2*$x2);
    $pdf->MultiCell(14, 32, $row2["PRE"], 1, '0','C', true);
    $pdf->SetXY(154,-13+$y2*$x2 );
    $pdf->MultiCell(46, 32, $row2["deskripsi"], 1, '0','C', true);
            }
    $no2++;
    $x2++;
    }
    $pdf->Ln(2);

    $pdf->SetFont('Arial','B','9');
    $pdf->SetTextColor(0,0,0);  

    $pdf->Cell(40, 7, 'C. Prestasi', 0, '0','L', true);
    $pdf->Ln();

    $pdf->SetFont('Arial','B','8');
    $pdf->SetFillColor(192,192,192);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(0,0,0);    
    $pdf->Cell(8, 7, 'No.', 1, '0','L', true);
    $pdf->Cell(73, 7, 'Jenis Prestasi', 1, '0','L', true);
    $pdf->Cell(108, 7, 'Keterangan', 1, '0','L', true);
    $pdf->Ln();

    $nop = 1;
    $pdf->SetFont('Arial','B','8');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(0,0,0);
        foreach ($query6 as $row){
    $pdf->Cell(8, 7, $nop, 1, '0','L', true);
    $pdf->Cell(73, 7, $row["jenis_prestasi"], 1, '0','L', true);
    $pdf->Cell(108, 7, $row["tingkat"], 1, '0','L', true);
    $no++;
        }
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial','B','9');
    $pdf->SetTextColor(0,0,0);  

    $pdf->Cell(40, 7, 'D. Absensi', 0, '0','L', true);
    $pdf->Ln();

    $pdf->SetFont('Arial','B','8');
    $pdf->SetFillColor(192,192,192);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(0,0,0);    
    $pdf->Cell(8, 7, 'No.', 1, '0','L', true);
    $pdf->Cell(73, 7, 'Aspek Kehadiran', 1, '0','L', true);
    $pdf->Cell(108, 7, 'Keterangan', 1, '0','L', true);
    $pdf->Ln();

    $pdf->SetFont('Arial','B','8');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(0,0,0);
        foreach ($sum as $row){
    $pdf->Cell(8, 7, '1', 1, '0','L', true);
    $pdf->Cell(73, 7, 'Hadir', 1, '0','L', true);
    $pdf->Cell(108, 7, $row["hadir"], 1, '0','L', true);
        }
    $pdf->Ln();
        foreach ($sum2 as $row){
    $pdf->Cell(8, 7, '2', 1, '0','L', true);
    $pdf->Cell(73, 7, 'Izin', 1, '0','L', true);
    $pdf->Cell(108, 7, $row["izin"], 1, '0','L', true);
        }
    $pdf->Ln();
        foreach ($sum3 as $row){
    $pdf->Cell(8, 7, '3', 1, '0','L', true);
    $pdf->Cell(73, 7, 'Alfa', 1, '0','L', true);
    $pdf->Cell(108, 7, $row["alfa"], 1, '0','L', true);
        }


    





    




$pdf->Output('i','Laporan Transaksi GIAN CELLULAR.pdf','false');
?>