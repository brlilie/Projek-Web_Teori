<?php
session_start();
include "db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM pengguna WHERE username='$username'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit;
    } else {
        echo "Password salah!";
    }
} else {
    echo "User tidak ditemukan!";
}
?>
