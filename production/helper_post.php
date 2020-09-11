<?php

session_start();

include 'config.php';
date_default_timezone_set("Asia/Jakarta");

$key = $_REQUEST['key'];
$data = $_POST['data'];

foreach ($data as $k => $item) {
    $col[] = $k;
    $_data[] = '.'.$item.'.';
}

$col_mysqli = implode(',', $col);

$val_mysqli = implode(',', $_data);
$_val_mysqli = str_replace(".","'",$val_mysqli);

if ($data['id']) {
    if ($key == 'daftar_kartu') {
        $sql = "UPDATE ".$key." 
        SET 
        no_id='".$data['no_id']."',
        nama='".$data['nama']."',
        nama_jabatan='".$data['nama_jabatan']."',
        waktu='".$data['waktu']."',
        keterangan='".$data['keterangan']."'
        WHERE id='".$data['id']."' ";
    }

    else if ($key == 'login') {
        $sql = "UPDATE ".$key." 
        SET 
        username='".$data['username']."',
        password='".$data['password']."'
        WHERE id='".$data['id']."' ";
    }
}

else {
    $sql = "INSERT INTO ".$key." (".$col_mysqli.") VALUES(".$_val_mysqli.")";
}

$query = mysqli_query($koneksi, $sql);

// insert log here
$__username = $_SESSION['data']['username'];
if ($key == 'daftar_kartu') {
    if ($data['id']) {
        $__aktivitas = 'Memperbarui data kartu dengan id unik '.$data['id'].' ';
    }
    else {
        $__aktivitas = 'Menambahkan data kartu baru dengan nomor id '.$data['no_id'].' & nama lengkap '.$data['nama'].' ';
    }
}
else if ($key == 'login') {
    if ($data['id']) {
        $__aktivitas = 'Memperbarui data administrator dengan id unik '.$data['id'].' ';
    }
    else {
        $__aktivitas = 'Menambahkan data administrator baru dengan username '.$data['username'].' ';
    }
}
$__tanggal = date("Y-m-d h:i:s");

$__sql = "INSERT INTO log_administrator (username, aktivitas, tanggal) VALUES('$__username', '$__aktivitas', '$__tanggal')";
$__query = mysqli_query($koneksi, $__sql);

if ($query) {
    $_SESSION['res'] = 'Data berhasil ditambahkan / diubah!';
}
else {
    $_SESSION['res'] = 'Data gagal ditambahkan / diubah!';
}

header('location:'.$_REQUEST['href'].'.php ');

?>