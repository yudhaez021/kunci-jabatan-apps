<?php
$__data = mysqli_query($koneksi,"SELECT * FROM ".$_SESSION['__data']." ORDER by tanggal ASC LIMIT 5 ");
?>