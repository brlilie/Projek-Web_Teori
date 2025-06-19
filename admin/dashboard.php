<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

require_once '../config/db.php'; // file koneksi pakai mysqli $conn

// Query total lomba
$result_lomba = mysqli_query($conn, "SELECT COUNT(*) AS total FROM daftar_lomba");
$data_lomba = mysqli_fetch_assoc($result_lomba);
$total_lomba = $data_lomba['total'];

// Query total pendaftar
$result_pendaftar = mysqli_query($conn, "SELECT COUNT(*) AS total FROM pendaftar");
$data_pendaftar = mysqli_fetch_assoc($result_pendaftar);
$total_pendaftar = $data_pendaftar['total'];

// Ambil semua data lomba
$data_lomba_all = mysqli_query($conn, "SELECT * FROM daftar_lomba ORDER BY tanggal_mulai DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      margin: 0;
    }

    #wrapper {
      display: flex;
      min-height: 100vh;
      transition: all 0.3s ease;
    }

    #sidebar-wrapper {
      min-height: 100vh;
      background: linear-gradient(180deg, #8A2BE2, #EE82EE);
      color: white;
      width: 15rem;
      position: fixed;
      transition: margin 0.3s ease;
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
      width: calc(100% - 15rem);
      transition: all 0.3s ease;
    }

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
    <div class="sidebar-heading p-3 fw-bold">Admin Panel</div>
    <div class="list-group list-group-flush">
      <a href="dashboard.php" class="list-group-item list-group-item-action active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
      <a href="upload-lomba.php" class="list-group-item list-group-item-action"><i class="fas fa-trophy me-2"></i> Kelola Lomba</a>
      <a href="upload-booklet.php" class="list-group-item list-group-item-action"><i class="fas fa-book me-2"></i> Kelola Booklet</a>
      <a href="data-pendaftar.php" class="list-group-item list-group-item-action"><i class="fas fa-users me-2"></i> Kelola Pendaftar</a>
      <a href="../logout.php" class="list-group-item list-group-item-action"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
    </div>
  </div>

  <div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <div class="container-fluid">
        <button class="btn btn-primary" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <div class="ms-auto">Halo, Admin!</div>
      </div>
    </nav>

    <div class="container-fluid mt-4">
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card shadow-sm border-0">
            <div class="card-body">
              <h5 class="card-title text-primary">Total Lomba Aktif</h5>
              <p class="card-text fs-3"><?= $total_lomba ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card shadow-sm border-0">
            <div class="card-body">
              <h5 class="card-title text-success">Total Pendaftar</h5>
              <p class="card-text fs-3"><?= $total_pendaftar ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="card shadow-sm border-0 mt-4">
        <div class="card-header bg-primary text-white">
          Daftar Lomba
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Judul Lomba</th>
                  <th>Deskripsi</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = mysqli_fetch_assoc($data_lomba_all)) : ?>
                <tr>
                  <td><?= htmlspecialchars($row['judul_lomba']) ?></td>
                  <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                  <td><?= date('d M Y', strtotime($row['tanggal_mulai'])) ?></td>
                  <td><?= date('d M Y', strtotime($row['tanggal_selesai'])) ?></td>
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
