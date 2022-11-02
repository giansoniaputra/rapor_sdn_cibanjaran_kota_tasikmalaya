<?php 
//koneksi
$host = "localhost";
$user = "root";
$pass = "";
$db = "raport_sd";

$conn = mysqli_connect($host, $user, $pass, $db);

	if (!$conn) {
		die("Koneksi Gagal:".mysqli_connect_error());
	}
?>    