<?php
$koneksi = mysqli_connect("localhost", "root", "", "lombain");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
