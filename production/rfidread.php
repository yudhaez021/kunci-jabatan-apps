<?php 

require 'koneksi.php';

$idcard = $_GET["idcard"];

$hasil = mysqli_query($conn, "SELECT * FROM daftar_kartu WHERE no_id = '$idcard' ");

$row = mysqli_fetch_array($hasil);

echo "ID CARD :", $row["no_id"];

?>