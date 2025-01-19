<?php

$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");

$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM program_bantuan WHERE id='$id'");

header("location:../../user.php?page=laporan");
