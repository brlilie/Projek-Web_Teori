<?php
require_once '../config/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Optional: ambil poster lama untuk dihapus juga dari server
    $poster_query = $conn->query("SELECT poster_lomba FROM daftar_lomba WHERE id_lomba = $id");
    $poster_data = $poster_query->fetch_assoc();
    $poster_path = '../' . $poster_data['poster_lomba'];

    // Hapus dari DB
    $query = "DELETE FROM daftar_lomba WHERE id_lomba = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if (file_exists($poster_path)) {
            unlink($poster_path); // Hapus file poster dari server
        }
        header("Location: ../admin/upload-lomba.php?msg=deleted");
        exit;
    } else {
        echo "Gagal hapus: " . $stmt->error;
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
