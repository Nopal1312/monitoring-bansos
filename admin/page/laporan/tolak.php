<?php
$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");

$id = $_POST["id"];
$alasan = $_POST["alasan_penolakan"];

mysqli_query($koneksi, "UPDATE laporan SET status = 'ditolak', alasan_penolakan = '$alasan' WHERE id=$id");
header("location:../../admin.php?page=laporan");
