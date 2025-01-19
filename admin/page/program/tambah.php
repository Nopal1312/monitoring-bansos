<?php

$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");

$nama = $_POST["nama_program"];

mysqli_query($koneksi,"INSERT INTO program_bantuan VALUES('','$nama')");

header("location:../../admin.php?page=program");
?>