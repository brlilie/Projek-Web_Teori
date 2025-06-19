<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
require_once '../config/db.php'; 

// Mengambil daftar lomba untuk form upload
$resultLomba = $conn->query("SELECT id_lomba, judul_lomba FROM daftar_lomba");

// Mengambil daftar booklet yang sudah ada
$queryBooklet = "
    SELECT b.id_booklet, b.nama_booklet, b.file_path, b.tanggal_upload, l.judul_lomba, l.id_lomba as booklet_id_lomba
    FROM booklet b
    JOIN daftar_lomba l ON b.id_lomba = l.id_lomba
    ORDER BY b.tanggal_upload DESC
";
$resultBooklet = $conn->query($queryBooklet);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Booklet - Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* CSS Diperbarui untuk Toggle Sidebar */
        body { background-color: #f8f9fa; margin: 0; }
        #wrapper { display: flex; min-height: 100vh; transition: all 0.3s ease; }
        #sidebar-wrapper {
            min-height: 100vh;
            background: linear-gradient(180deg, #8A2BE2, #EE82EE);
            color: white;
            width: 15rem;
            position: fixed;
            transition: margin 0.3s ease;
        }
        #sidebar-wrapper .sidebar-heading {
            padding: 1.25rem; font-weight: bold; border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        #sidebar-wrapper .list-group-item {
            color: white;
            background-color: transparent;
            border: none;
        }
        #sidebar-wrapper .list-group-item:hover,
        #sidebar-wrapper .list-group-item.active {
            background-color: rgba(255, 255, 255, 0.2);
        }
        #page-content-wrapper {
            margin-left: 15rem;
            width: calc(100% - 15rem);
            transition: all 0.3s ease;
        }
        /* Aturan untuk kondisi toggled */
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        #wrapper.toggled #page-content-wrapper {
            margin-left: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="d-flex" id="wrapper">
    <div id="sidebar-wrapper">
        <div class="sidebar-heading">Admin Panel</div>
        <div class="list-group list-group-flush">
            <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
            <a href="upload-lomba.php" class="list-group-item list-group-item-action"><i class="fas fa-trophy me-2"></i> Kelola Lomba</a>
            <a href="upload-booklet.php" class="list-group-item list-group-item-action active"><i class="fas fa-book me-2"></i> Kelola Booklet</a>
            <a href="data-pendaftar.php" class="list-group-item list-group-item-action"><i class="fas fa-users me-2"></i> Kelola Pendaftar</a>
            <a href="../logout.php" class="list-group-item list-group-item-action"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </div>
    </div>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                <div class="ms-auto fw-bold">Halo, Admin!</div>
            </div>
        </nav>

        <div class="container-fluid mt-4">
            <h3 class="mb-4">Kelola Booklet</h3>

            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-primary text-white">Unggah Booklet Baru</div>
                <div class="card-body">
                    <form action="../proses/booklet_proses.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="id_lomba" class="form-label">Pilih Lomba</label>
                            <select class="form-select" id="id_lomba" name="id_lomba" required>
                                <option value="">-- Pilih Lomba --</option>
                                <?php 
                                // Reset pointer result set untuk loop baru
                                $resultLomba->data_seek(0); 
                                while($row = $resultLomba->fetch_assoc()): 
                                ?>
                                    <option value="<?= $row['id_lomba'] ?>"><?= htmlspecialchars($row['judul_lomba']) ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_booklet" class="form-label">Nama Booklet</label>
                            <input type="text" class="form-control" id="nama_booklet" name="nama_booklet" required>
                        </div>
                        <div class="mb-3">
                            <label for="file_booklet" class="form-label">Pilih File (PDF)</label>
                            <input type="file" class="form-control" id="file_booklet" name="file_booklet" accept=".pdf" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-upload me-1"></i> Upload</button>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">Daftar Booklet</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Booklet</th>
                                    <th>File</th>
                                    <th>Tanggal Upload</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; while($row = $resultBooklet->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($row['nama_booklet']) ?><br><small class="text-muted"><?= htmlspecialchars($row['judul_lomba']) ?></small></td>
                                    <td>
                                        <a href="../booklet/<?= $row['file_path'] ?>" target="_blank"><?= htmlspecialchars($row['file_path']) ?></a>
                                    </td>
                                    <td><?= date("d M Y", strtotime($row['tanggal_upload'])) ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_booklet'] ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <a href="../proses/hapus_booklet_proses.php?id=<?= $row['id_booklet'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus booklet ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>

                                        <div class="modal fade" id="editModal<?= $row['id_booklet'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id_booklet'] ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="../proses/edit_booklet_proses.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel<?= $row['id_booklet'] ?>">Edit Booklet</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            <input type="hidden" name="id_booklet" value="<?= $row['id_booklet'] ?>">
                                                            <div class="mb-3">
                                                                <label for="edit_nama_booklet" class="form-label">Nama Booklet</label>
                                                                <input type="text" name="nama_booklet" id="edit_nama_booklet" class="form-control" value="<?= htmlspecialchars($row['nama_booklet']) ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Ganti Lomba</label>
                                                                <select name="id_lomba" class="form-select">
                                                                    <?php
                                                                    // Loop lagi untuk dropdown di modal
                                                                    $resultLomba->data_seek(0);
                                                                    while($lomba = $resultLomba->fetch_assoc()){
                                                                        $selected = ($lomba['id_lomba'] == $row['booklet_id_lomba']) ? 'selected' : '';
                                                                        echo "<option value='{$lomba['id_lomba']}' {$selected}>" . htmlspecialchars($lomba['judul_lomba']) . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">File Saat Ini</label><br>
                                                                <a href="../booklet/<?= $row['file_path'] ?>" target="_blank"><?= htmlspecialchars($row['file_path']) ?></a>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="edit_file_booklet" class="form-label">Upload File Baru (opsional)</label>
                                                                <input type="file" name="file_booklet" id="edit_file_booklet" class="form-control" accept=".pdf">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Script untuk Toggle Sidebar
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("sidebarToggle").addEventListener("click", function () {
            document.getElementById("wrapper").classList.toggle("toggled");
        });
    });
</script>
</body>
</html>
