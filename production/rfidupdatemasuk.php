<?php

require 'koneksi.php';
ini_set('date.timezone', 'Asia/Jakarta');
$now = new DateTime();

$idcard = $_GET['idcard'];
	
	$datenow = $now->format("Y-m-d H:i:s");

	$hasil = mysqli_query($conn, "SELECT * FROM daftar_kartu WHERE no_id = '$idcard' ");
	$row = mysqli_fetch_array($hasil);
	
	if (mysqli_num_rows($hasil) === 1 ){
		echo "ID CARD :", $row["no_id"];

		$__sql = "UPDATE daftar_kartu SET keterangan = 'Masuk', waktu = '$datenow' WHERE no_id = '$idcard' ";
		$__result = mysqli_query($conn, $__sql);

		$sql = "INSERT INTO log_user (no_id, aktivitas, tanggal) VALUES('$idcard', 'User $idcard melakukan masuk', '$datenow')";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			die('Invalid query: ');
		}	
	}

	else {
		echo "%none";
	}	
	
mysqli_close($conn);


?>