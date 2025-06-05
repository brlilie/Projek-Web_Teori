<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - LombaApps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+VUe2MyuLh1+ALv4G9iC4b4B09pYf5b+Q0/c8BqFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css"> <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang umum */
        }
        #wrapper {
            display: flex;
        }
        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            transition: margin .25s ease-out;
            background: linear-gradient(180deg, #8A2BE2, #EE82EE); /* Gradasi ungu-pink untuk sidebar */
            color: white;
            width: 15rem;
            position: fixed; /* Sidebar tetap */
            z-index: 1000;
        }
        #sidebar-wrapper .sidebar-heading {
            padding: 1.0rem 1.25rem;
            font-size: 1.2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-weight: bold;
        }
        #sidebar-wrapper .list-group {
            width: 100%;
        }
        #sidebar-wrapper .list-group-item {
            color: white;
            background-color: transparent;
            border: none;
            padding: 0.8rem 1.25rem;
            transition: background-color 0.2s ease;
        }
        #sidebar-wrapper .list-group-item:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }
        #page-content-wrapper {
            min-width: 100vw;
            margin-left: 15rem; /* Sesuaikan dengan lebar sidebar */
        }
        /* Style untuk hamburger menu */
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Responsif untuk sidebar */
        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }
            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }
            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="dashboard.php" class="list-group-item list-group-item-action active">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
                <a href="upload-lomba.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-trophy me-2"></i> Kelola Lomba
                </a>
                <a href="upload-booklet.php" class="list-group-item list-group-item-action">
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
                        <i class="fas fa-bars"></i> </button>
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
                <h1 class="mt-4 mb-4">Dashboard Admin</h1>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Total Lomba Aktif</h5>
                                <p class="card-text fs-3">15</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title text-success">Total Pendaftar Baru</h5>
                                <p class="card-text fs-3">8</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title text-warning">Lomba Menjelang Deadline</h5>
                                <p class="card-text fs-3">3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mt-4">
                    <div class="card-header bg-primary text-white">
                        Lomba Terbaru
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">UI/UX Competition - Deadline: 10 Juni 2025</li>
                            <li class="list-group-item">Lomba Karya Tulis Ilmiah - Deadline: 14 Juni 2025</li>
                            <li class="list-group-item">Turnamen E-sports Valorant - Deadline: 20 Juni 2025</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function() {
            document.getElementById("wrapper").classList.toggle("toggled");
        });
    </script>
    <script src="../assets/js/script.js"></script> </body>
</html>