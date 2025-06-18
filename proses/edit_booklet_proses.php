<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_booklet'];
    $nama = $_POST['nama_booklet'];
    $tanggal = date('Y-m-d H:i:s');

   
    $stmt = $conn->prepare("SELECT file_path FROM booklet WHERE id_booklet = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $old = $result->fetch_assoc();

    $file_path = $old['file_path']; 

    // Cek jika ada file baru diupload
    if (!empty($_FILES['file_booklet']['name'])) {
        $fileName = basename($_FILES['file_booklet']['name']);
        $targetDir = "../booklet/";
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES['file_booklet']['tmp_name'], $targetFilePath)) {
            $file_path = $fileName;

            
            $oldPath = $targetDir . $old['file_path'];
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        } else {
            die("Gagal mengupload file baru.");
        }
    }

   
    $stmt = $conn->prepare("UPDATE booklet SET nama_booklet = ?, file_path = ?, tanggal_upload = ? WHERE id_booklet = ?");
    $stmt->bind_param("sssi", $nama, $file_path, $tanggal, $id);

    if ($stmt->execute()) {
        header("Location: ../admin/upload-booklet.php?status=sukses_edit");
        exit;
    } else {
        echo "Gagal mengedit booklet.";
    }
}
?>
