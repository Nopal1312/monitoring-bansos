<?php
$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");

$id = $_GET["id"];
mysqli_query($koneksi, "UPDATE laporan SET status = 'disetujui' WHERE id='$id'");
header("location:../../admin.php?page=laporan");
