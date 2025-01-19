<?php

$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");

$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");

header("location:../../admin.php?page=user");
