<?php

require 'koneksi.php';
ini_set('date.timezone', 'Asia/Jakarta');
$now = new DateTime();

$rfid = $_GET['idcard'];
$value = $_GET['val'];

	$datenow = $now->format("Y-m-d H:i:s");

	// cek apakah dia ada data id ktp nya atau engga
	$hasil = mysqli_query($conn, "SELECT * FROM daftar_kartu WHERE no_id = '$rfid' ");
	$row = mysqli_fetch_array($hasil);

	if ($row["no_id"]) {
		echo "<h1>DATA IS ALREADY ON SERVER!!</h1>";
	}
	else {
		$sql = "INSERT INTO daftar_kartu VALUES ('', '$rfid', '', '', '', '', '$datenow')";

		$result = mysqli_query($conn, $sql);
		if (!$result) {
			die('Invalid query: ');
		}
		echo "<h1>THE DATA HAS BEEN SENT!!</h1>";
	}
	mysqli_close($conn);
?>