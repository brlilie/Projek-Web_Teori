<?php
require_once '../config/db.php';

if ($_POST['form_mode'] === 'edit') {
    $id = $_POST['id_lomba']; // ✅ Correct name
    $judul = $_POST['judul_lomba'];
    $deskripsi = $_POST['deskripsi'];
    $ketentuan = $_POST['ketentuan'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $deadline = $_POST['deadline_pendaftaran'];
    $penyelenggara = $_POST['penyelenggara'];
    $hadiah = $_POST['hadiah'];
    $link = $_POST['link_pendaftaran'];
    $kategori = $_POST['kategori'];
    $poster_path = $_POST['current_poster']; 

    // Jika ada poster baru diunggah
    if (!empty($_FILES['poster_lomba']['name'])) {
        $poster_name = basename($_FILES['poster_lomba']['name']);
        $poster_tmp = $_FILES['poster_lomba']['tmp_name'];
        $poster_path = 'assets/images/' . $poster_name;

        move_uploaded_file($poster_tmp, '../' . $poster_path);
    }

    // Update query
    $query = "UPDATE daftar_lomba SET
        judul_lomba = ?, deskripsi = ?, ketentuan = ?, tanggal_mulai = ?, tanggal_selesai = ?, 
        deadline_pendaftaran = ?, penyelenggara = ?, hadiah = ?, kategori = ?, poster_lomba = ?
        WHERE id_lomba = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssssi", $judul, $deskripsi, $ketentuan, $tanggal_mulai, $tanggal_selesai,
        $deadline, $penyelenggara, $hadiah,  $kategori, $poster_path, $id);

    if ($stmt->execute()) {
        header("Location: ../admin/upload-lomba.php?msg=updated");
        exit;
    } else {
        echo "Update gagal: " . $stmt->error;
    }
}
?>
