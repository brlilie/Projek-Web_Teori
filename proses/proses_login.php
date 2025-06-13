<?php
session_start();
include "../config/db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM pengguna WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../user/home.php");
        }
        exit;
    } else {
        echo "Password salah!";
    }
} else {
    echo "Akun tidak ditemukan!";
}
?>
