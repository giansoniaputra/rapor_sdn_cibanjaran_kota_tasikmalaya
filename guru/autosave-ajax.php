<?php 
include '../config/config.php';
$nama = $_GET["nama"];
$id = $_GET["absen"];
$tgl = $_GET["tgl"];
$kelas = $_GET["kelas"];
$hadir = $_GET["kehadiran"];

$siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = '$nama' ");
$data = mysqli_fetch_array($siswa);
$nama_siswa = $data["nama_lengkap"]; 

$absen = mysqli_query($conn, "SELECT * FROM absen_siswa WHERE id_absen = '$id' ");



if (mysqli_num_rows($absen) === 0){
    $query = "INSERT INTO absen_siswa VALUES ('','$nama','$tgl','$nama_siswa','$kelas','$hadir')";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}else if(mysqli_num_rows($absen) === 1){
    $query = "UPDATE absen_siswa SET id_siswa = '$id_siswa', tanggal = '$tgl', nama_lengkap = '$nama_lengkap', kelas_siswa = '$kelas_siswa', kehadiran = '$kehadiran' SET id_absen = '$id_absen' WHERE id_absen = '$id_absen";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


?>