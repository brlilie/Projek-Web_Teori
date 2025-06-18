<?php
require_once '../config/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $result = $conn->query("SELECT file_path  FROM booklet WHERE id_booklet = $id");
    $data = $result->fetch_assoc();
    $file = $data['file_path'];

    if (file_exists("../booklet/$file")) {
        unlink("../booklet/$file");
    }

    
    $conn->query("DELETE FROM booklet WHERE id_booklet = $id");
}

header("Location: ../admin/upload-booklet.php");
exit;
