<?php

$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");

session_start();

$user_id = $_SESSION['data']['id'];
$nama_program = $_POST['nama_program'];
$jumlah_penerima = $_POST['jumlah_penerima'];
$wilayah = $_POST['wilayah'];
$tgl_penyaluran = $_POST['tgl_penyaluran'];
$bukti_penyaluran = $_POST['bukti_penyaluran'];
$catatan_tambahan = $_POST['catatan_tambahan'];

mysqli_query($koneksi,"INSERT INTO laporan VALUES('','$user_id','$nama_program','$jumlah_penerima','$wilayah','$tgl_penyaluran','$bukti_penyaluran','$catatan_tambahan','pending','')");

header("location:../../user.php?page=laporan");

?>