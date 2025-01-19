<?php

$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");

$provinsi = $_POST["provinsi"];
$kabupaten = $_POST["kabupaten"];
$kecamatan = $_POST["kecamatan"];

mysqli_query($koneksi,"INSERT INTO wilayah VALUES('','$provinsi','$kabupaten','$kecamatan')");

header("location:../../admin.php?page=wilayah");
?>