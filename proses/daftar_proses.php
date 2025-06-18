<?php
session_start();
require_once('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tim = $_POST['nama_tim'];
    $institusi = $_POST['institusi'];
    $nama_ketua = $_POST['nama_ketua'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $id_lomba = $_POST['id_lomba'];
    $id_pengguna = $_SESSION['id'];


    // Upload file bukti pembayaran
    $buktiName = $_FILES['bukti_pembayaran']['name'];
    $buktiTmp = $_FILES['bukti_pembayaran']['tmp_name'];
    $targetDir = '../assets/pembayaran/';
    $filePath = $targetDir . basename($buktiName);

    if (move_uploaded_file($buktiTmp, $filePath)) {
        // Simpan ke database
        $stmt = $conn->prepare("INSERT INTO pendaftar 
            (nama_tim, institusi, nama_ketua, email, whatsapp, bukti_pembayaran, id_lomba, id_pengguna)
            VALUES (?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("ssssssii", $nama_tim, $institusi, $nama_ketua, $email, $whatsapp, $buktiName, $id_lomba, $id_pengguna);
        $stmt->execute();

        header("Location: ../user/pendaftaran_berhasil.php"); // redirect ke halaman sukses
        exit;
    } else {
        echo "Upload bukti pembayaran gagal.";
    }
}
?>
