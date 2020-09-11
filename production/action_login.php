<?php

include "config.php";

$data = $_POST['data'];
$username = $data['username'];
$password = $data['password'];
$result = mysqli_query($koneksi,"SELECT * FROM login WHERE username = '$usernme' AND password = '$password' ");

if ($result) {
    session_start();

    $_SESSION['data'] = $data;

    header("location:dashboard.php");
}
else {
    session_start();

    $_SESSION['failed'] = true;
    header("location:index.php");
}

?>