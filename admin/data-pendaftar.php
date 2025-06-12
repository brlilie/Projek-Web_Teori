<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar - Admin LombaApps</title>
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
                <h1 class="mt-4 mb-4">Data Pendaftar Lomba</h1>
                <p>Pilih lomba untuk melihat daftar pendaftar:</p>
                <div class="mb-3">
                    <select class="form-select" id="selectLomba">
                        <option selected disabled>Pilih Lomba...</option>
                        <option value="1">Desain Poster Kreatif</option>
                        <option value="2">Lomba Menulis Cerpen</option>
                        <option value="3">Turnamen E-sports Valorant</option>
                    </select>
                </div>

                <div class="card shadow-sm border-0 mt-4">
                    <div class="card-header bg-primary text-white">
                        Daftar Pendaftar untuk Lomba [Nama Lomba]
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Peserta</th>
                                        <th>Email</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status Pendaftaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Budi Santoso</td>
                                        <td>budi@example.com</td>
                                        <td>2025-06-01</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <button class="btn btn-success btn-sm me-1"><i class="fas fa-check"></i> Terima</button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tolak</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Citra Dewi</td>
                                        <td>citra@example.com</td>
                                        <td>2025-06-02</td>
                                        <td><span class="badge bg-success">Diterima</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1"><i class="fas fa-info-circle"></i> Detail</button>
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
        // Contoh sederhana untuk mengubah judul tabel berdasarkan pilihan lomba (ini masih statis, akan dinamis dengan PHP)
        document.getElementById("selectLomba").addEventListener("change", function() {
            const selectedLomba = this.options[this.selectedIndex].text;
            document.querySelector(".card-header").innerText = "Daftar Pendaftar untuk Lomba " + selectedLomba;
        });
    </script>
    <script src="../assets/js/script.js"></script>
</body>
</html>
