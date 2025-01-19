<?php
include 'koneksi.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mengecek login
$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    if ($data['hak'] == "admin") {
        $_SESSION['username'] = $data['username'];
        $_SESSION['data'] = $data;
        $_SESSION['hak'] = "admin";
        header("Location: admin/admin.php");
    } else if ($data['hak'] == "user") {
        $_SESSION['username'] = $data['username'];
        $_SESSION['data'] = $data;
        $_SESSION['hak'] = "user";
        header("Location: user/user.php");
    } else {
        header("Location: index.php?pesan=gagal");
    }
} else {
    header("Location: index.php?pesan=gagal");
}
