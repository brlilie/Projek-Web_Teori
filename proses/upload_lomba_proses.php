<?php
require_once '../config/db.php';

if ($_POST['form_mode'] === 'tambah') {
    $judul = $_POST['judul_lomba'];
    $deskripsi = $_POST['deskripsi'];
    $ketentuan = $_POST['ketentuan'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $deadline = $_POST['deadline_pendaftaran'];
    $penyelenggara = $_POST['penyelenggara'];
    $hadiah = $_POST['hadiah'];
    $kategori = $_POST['kategori'];

    $poster_path = ''; // default kosong

    // Jika ada file poster diupload
    if (!empty($_FILES['poster_lomba']['name'])) {
        $poster_name = $_FILES['poster_lomba']['name'];
        $poster_tmp = $_FILES['poster_lomba']['tmp_name'];
        $poster_path = 'assets/images/' . $poster_name;

        move_uploaded_file($poster_tmp, '../' . $poster_path);
    }

    // INSERT query
    $query = "INSERT INTO daftar_lomba (
        judul_lomba, deskripsi, ketentuan, tanggal_mulai, tanggal_selesai, deadline_pendaftaran,
        penyelenggara, hadiah, kategori, poster_lomba
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssss", $judul, $deskripsi, $ketentuan, $tanggal_mulai, $tanggal_selesai,
        $deadline, $penyelenggara, $hadiah, $kategori, $poster_path);

    if ($stmt->execute()) {
        header("Location: ../admin/upload-lomba.php?msg=added");
        exit;
    } else {
        echo "Insert gagal: " . $stmt->error;
    }
}
?>
