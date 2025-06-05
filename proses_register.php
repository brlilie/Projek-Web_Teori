<?php
include "db.php";

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = "INSERT INTO pengguna (username, password) VALUES ('$username', '$password')";
if (mysqli_query($koneksi, $query)) {
    header("Location: login.php");
    exit;
} else {
    echo "Gagal mendaftar: " . mysqli_error($koneksi);
}
?>
