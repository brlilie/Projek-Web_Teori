<?php
include "../config/db.php";

$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];


if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    echo "Format email tidak valid.";
    exit;
}

$cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$username'");
if (mysqli_num_rows($cek) > 0) {
    echo "Email sudah terdaftar. Silakan gunakan email lain.";
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$role = 'user'; 

$query = "INSERT INTO pengguna (username, password, nama,  role) VALUES ('$username', '$hashed_password', '$nama', '$role')";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../login.php");
    exit;
} else {
    echo "Gagal mendaftar: " . mysqli_error($koneksi);
}
?>
