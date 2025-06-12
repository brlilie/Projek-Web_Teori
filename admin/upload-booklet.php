<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Booklet - Admin LombaApps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style> /* Styling serupa dengan dashboard untuk konsistensi */
        body { background-color: #f8f9fa; }
        #wrapper { display: flex; }
        #sidebar-wrapper { /* ... (paste CSS dari dashboard.php) ... */
            min-height: 100vh; margin-left: -15rem; transition: margin .25s ease-out;
            background: linear-gradient(180deg, #8A2BE2, #EE82EE); color: white;
            width: 15rem; position: fixed; z-index: 1000;
        }
        #sidebar-wrapper .sidebar-heading { padding: 1.0rem 1.25rem; font-size: 1.2rem; border-bottom: 1px solid rgba(255, 255, 255, 0.1); font-weight: bold; }
        #sidebar-wrapper .list-group { width: 100%; }
        #sidebar-wrapper .list-group-item { color: white; background-color: transparent; border: none; padding: 0.8rem 1.25rem; transition: background-color 0.2s ease; }
        #sidebar-wrapper .list-group-item:hover { background-color: rgba(255, 255, 255, 0.2); color: white; }
        #page-content-wrapper { min-width: 100vw; margin-left: 15rem; }
        .navbar-toggler { border-color: rgba(255, 255, 255, 0.1); }
        .navbar-toggler-icon { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e"); }
        @media (min-width: 768px) {
            #sidebar-wrapper { margin-left: 0; }
            #page-content-wrapper { min-width: 0; width: 100%; }
            #wrapper.toggled #sidebar-wrapper { margin-left: -15rem; }
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="dashboard.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
                <a href="upload-lomba.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-trophy me-2"></i> Kelola Lomba
                </a>
                <a href="upload-booklet.php" class="list-group-item list-group-item-action active">
                    <i class="fas fa-book me-2"></i> Kelola Booklet
                </a>
                <a href="data-pendaftar.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-users me-2"></i> Kelola Pendaftar
                </a>
                <a href="../logout.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Halo, Admin!</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4 mb-4">Kelola Booklet</h1>
                <p>Di sini admin bisa mengunggah dan mengelola file-file booklet yang bisa diunduh oleh user.</p>
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-primary text-white">
                        Unggah Booklet Baru
                    </div>
                    <div class="card-body">
                        <form action="../proses/upload_booklet_proses.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_booklet" class="form-label">Nama Booklet</label>
                                <input type="text" class="form-control" id="nama_booklet" name="nama_booklet" required>
                            </div>
                            <div class="mb-3">
                                <label for="file_booklet" class="form-label">Pilih File Booklet (PDF)</label>
                                <input class="form-control" type="file" id="file_booklet" name="file_booklet" accept=".pdf" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Unggah Booklet</button>
                        </form>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        Daftar Booklet Tersedia
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Booklet</th>
                                        <th>File</th>
                                        <th>Tanggal Unggah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Booklet Lomba Desain Grafis 2025</td>
                                        <td><a href="../booklet/booklet-desain.pdf" target="_blank">booklet-desain.pdf</a></td>
                                        <td>2025-05-20</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus booklet ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
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
        document.getElementById("sidebarToggle").addEventListener("click", function() {
            document.getElementById("wrapper").classList.toggle("toggled");
        });
    </script>
    <script src="../assets/js/script.js"></script>
</body>
</html>
