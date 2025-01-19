<?php

$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");

session_start();
$id = $_POST['id'];
$user_id = $_SESSION['data']['id'];
$nama_program = $_POST['nama_program'];
$jumlah_penerima = $_POST['jumlah_penerima'];
$wilayah = $_POST['wilayah'];
$tgl_penyaluran = $_POST['tgl_penyaluran'];
$bukti_penyaluran = $_POST['bukti_penyaluran'];
$catatan_tambahan = $_POST['catatan_tambahan'];

mysqli_query($koneksi, "UPDATE laporan SET nama_program = '$nama_program', jumlah_penerima='$jumlah_penerima', wilayah = '$wilayah', tgl_penyaluran = '$tgl_penyaluran', bukti_penyaluran = '$bukti_penyaluran', catatan = '$catatan_tambahan' WHERE id='$id'");

header("location:../../user.php?page=laporan");
