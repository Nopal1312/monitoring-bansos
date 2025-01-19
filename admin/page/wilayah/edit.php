<?php

$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");


$id = $_POST["id"];

$provinsi = $_POST["provinsi"];
$kabupaten = $_POST["kabupaten"];
$kecamatan = $_POST["kecamatan"];

mysqli_query($koneksi, "UPDATE wilayah SET provinsi='$provinsi', kabupaten='$kabupaten', kecamatan='$kecamatan' WHERE id='$id'");

header("location:../../admin.php?page=wilayah");
