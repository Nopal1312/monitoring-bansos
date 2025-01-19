<?php

$koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");


$id = $_POST["id"];
$username = $_POST["username"];

mysqli_query($koneksi, "UPDATE user SET username  = '$username' WHERE id='$id'");

header("location:../../admin.php?page=user");
