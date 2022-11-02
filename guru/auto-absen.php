<?php
include '../config/view.php';
    $id = $_GET["id_siswa"];
    $tgl = $_GET["tanggal"];

$query = mysqli_query($conn, "SELECT * FROM absen_siswa WHERE id_siswa = '$id' AND tanggal = '$tgl'");
    if(mysqli_num_rows($query) === 1){
    $mhs = mysqli_fetch_assoc($query);

    $data = array(
    'kehadiran' => $mhs['kehadiran']
        
    );
} else if(mysqli_num_rows($query) === 0){
    $data["kehadiran"] = '';
}

echo json_encode($data);


?>