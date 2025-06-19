<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

require_once '../config/db.php';

$id_lomba = isset($_GET['id_lomba']) && $_GET['id_lomba'] != 0 ? (int)$_GET['id_lomba'] : null;

// Ambil semua daftar lomba untuk dropdown
$lomba_result = mysqli_query($conn, "SELECT id_lomba, judul_lomba FROM daftar_lomba");

// Ambil data pendaftar
$sql = "
    SELECT p.*, l.judul_lomba
    FROM pendaftar p
    JOIN daftar_lomba l ON p.id_lomba = l.id_lomba
";

if ($id_lomba) {
    $sql .= " WHERE p.id_lomba = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_lomba);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $result = mysqli_query($conn, $sql);
}
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar - Admin LombaApps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        #wrapper { display: flex; }

        #sidebar-wrapper {
            min-height: 100vh;
            background: linear-gradient(180deg, #8A2BE2, #EE82EE);
            color: white;
            width: 15rem;
            position: fixed;
        }

        #sidebar-wrapper .list-group-item {
            color: white;
            background-color: transparent;
            border: none;
        }

        #sidebar-wrapper .list-group-item:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        #page-content-wrapper {
            margin-left: 15rem;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
            transition: margin 0.3s ease;
        }

        #wrapper.toggled #page-content-wrapper {
            margin-left: 0;
            transition: margin 0.3s ease;
        }

        #sidebar-wrapper,
        #page-content-wrapper {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div class="sidebar-heading p-3 fw-bold">Admin Panel</div>
        <div class="list-group list-group-flush">
            <a href="dashboard.php" class="list-group-item list-group-item-action">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="upload-lomba.php" class="list-group-item list-group-item-action">
                <i class="fas fa-trophy me-2"></i> Kelola Lomba
            </a>
            <a href="upload-booklet.php" class="list-group-item list-group-item-action">
                <i class="fas fa-book me-2"></i> Kelola Booklet
            </a>
            <a href="data-pendaftar.php" class="list-group-item list-group-item-action active">
                <i class="fas fa-users me-2"></i> Kelola Pendaftar
            </a>
            <a href="../logout.php" class="list-group-item list-group-item-action">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="ms-auto">Halo, Admin!</div>
            </div>
        </nav>

        <div class="container-fluid mt-4">
            <h1 class="mb-4">Data Pendaftar Lomba</h1>
            <form method="GET" class="mb-3 row">
                <div class="col-md-6">
                    <select class="form-select" name="id_lomba" onchange="this.form.submit()">
                        <option value="0">Semua Lomba</option>
                        <?php while ($row = mysqli_fetch_assoc($lomba_result)): ?>
                            <option value="<?= $row['id_lomba'] ?>" <?= ($id_lomba == $row['id_lomba']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['judul_lomba']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </form>

            <div class="card shadow-sm border-0 mt-3">
                <div class="card-header bg-primary text-white">
                    Daftar Pendaftar <?= $id_lomba ? 'untuk Lomba ID ' . htmlspecialchars($id_lomba) : '' ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Tim</th>
                                    <th>Institusi</th>
                                    <th>Nama Ketua</th>
                                    <th>Email</th>
                                    <th>WhatsApp</th>
                                    <th>Lomba</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($row['nama_tim']) ?></td>
                                        <td><?= htmlspecialchars($row['institusi']) ?></td>
                                        <td><?= htmlspecialchars($row['nama_ketua']) ?></td>
                                        <td><?= htmlspecialchars($row['email']) ?></td>
                                        <td><?= htmlspecialchars($row['whatsapp']) ?></td>
                                        <td><?= htmlspecialchars($row['judul_lomba']) ?></td>
                                        <td>
                                            <a href="../assets/pembayaran/<?= urlencode($row['bukti_pembayaran']) ?>" target="_blank">Lihat</a>
                                        </td>
                                        <td><?= htmlspecialchars($row['tanggal_daftar']) ?></td>
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
    document.getElementById("sidebarToggle").addEventListener("click", function () {
        document.getElementById("wrapper").classList.toggle("toggled");
    });
</script>
</body>
</html>
