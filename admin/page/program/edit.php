<?php

$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");


$id = $_POST["id"];
$nama = $_POST["nama_program"];

mysqli_query($koneksi, "UPDATE program_bantuan SET nama_program  = '$nama' WHERE id='$id'");

header("location:../../admin.php?page=program");
