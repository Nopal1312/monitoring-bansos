<?php

$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");

$username = $_POST["username"];
$password = $_POST["password"];

mysqli_query($koneksi, "INSERT INTO user VALUES('','$username','$password','user')");

header("location:../../admin.php?page=user");
