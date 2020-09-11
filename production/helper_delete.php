<?php

include 'config.php';
date_default_timezone_set("Asia/Jakarta");

$key = $_REQUEST['key'];

$sql = "DELETE FROM ".$_REQUEST['key']." WHERE id = '".$_REQUEST['id']."'";
$query = mysqli_query($koneksi, $sql);

session_start();

// insert log here
$__username = $_SESSION['data']['username'];
if ($key == 'daftar_kartu') {
    $__aktivitas = 'Menghapus data kartu nomor id '.$_REQUEST['where'].' ';
}
else if ($key == 'login') {
    $__aktivitas = 'Menghapus data administrator username '.$_REQUEST['where'].' ';
}
$__tanggal = date("Y-m-d h:i:s");

$__sql = "INSERT INTO log_administrator (username, aktivitas, tanggal) VALUES('$__username', '$__aktivitas', '$__tanggal')";
$__query = mysqli_query($koneksi, $__sql);

if ($query) {
    $_SESSION['res'] = 'Data berhasil dihapus!';
}
else {
    $_SESSION['res'] = 'Data gagal dihapus!';
}

header('location:'.$_REQUEST['href'].'.php ');

?>