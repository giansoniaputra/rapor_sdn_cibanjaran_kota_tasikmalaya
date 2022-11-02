<?php
include '../config/config.php';
$id_siswa = $_GET["id_siswa"];
$id_mapel = $_GET["id_mapel"];

$query = mysqli_query($conn, "SELECT * FROM nilai_pengetahuan WHERE id_siswa = '$id_siswa' AND id_mapel = '$id_mapel'");
$mhs = mysqli_fetch_assoc($query);

$data = array(
    'h1' => $mhs['H1'],
    'h2' => $mhs['H2'],
    'h3' => $mhs['H3'],
    'h4' => $mhs['H4'],
    'h5' => $mhs['H5'],
    'h6' => $mhs['H6'],
    'h7' => $mhs['H7'],
    'h8' => $mhs['H8'],
    'pts' => $mhs['PTS'],
    'pas' => $mhs['PAS']

);

echo json_encode($data);




?>