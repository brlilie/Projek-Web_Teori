<?php
require_once '../config/db.php';

$nama = $_POST['nama_booklet'];
$idLomba = $_POST['id_lomba'];

if ($_FILES['file_booklet']['error'] === UPLOAD_ERR_OK) {
    $fileTmp = $_FILES['file_booklet']['tmp_name'];
    $fileName = basename($_FILES['file_booklet']['name']);
    $uploadDir = '../assets/booklet/';
    $filePath = $uploadDir . $fileName;

   
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($fileTmp, $filePath)) {
        // Simpan data ke database
        $stmt = $conn->prepare("INSERT INTO booklet (id_lomba, nama_booklet, file_path) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $idLomba, $nama, $fileName);
        $stmt->execute();

        header("Location: ../admin/upload-booklet.php?msg=added");
    } else {
        echo "❌ Gagal menyimpan file.";
    }
} else {
    echo "❌ Terjadi kesalahan saat upload.";
}
