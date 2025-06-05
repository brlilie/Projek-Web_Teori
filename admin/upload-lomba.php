<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Lomba - Admin LombaApps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style> /* Styling serupa dengan dashboard untuk konsistensi */
        body { background-color: #f8f9fa; }
        #wrapper { display: flex; }
        #sidebar-wrapper {
            min-height: 100vh; margin-left: -15rem; transition: margin .25s ease-out;
            background: linear-gradient(180deg, #8A2BE2, #EE82EE); color: white;
            width: 15rem; position: fixed; z-index: 1000;
        }
        #sidebar-wrapper .sidebar-heading { padding: 1.0rem 1.25rem; font-size: 1.2rem; border-bottom: 1px solid rgba(255, 255, 255, 0.1); font-weight: bold; }
        #sidebar-wrapper .list-group { width: 100%; }
        #sidebar-wrapper .list-group-item {
            color: white; background-color: transparent; border: none;
            padding: 0.8rem 1.25rem; transition: background-color 0.2s ease;
        }
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
                <a href="upload-lomba.php" class="list-group-item list-group-item-action active">
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
                <h1 class="mt-4 mb-4">Kelola Lomba</h1>

                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#lombaFormModal">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Lomba Baru
                </button>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        Daftar Lomba
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul Lomba</th>
                                        <th>Kategori</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Desain Poster Kreatif</td>
                                        <td>Desain</td>
                                        <td>2025-07-15</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#lombaFormModal" data-id="1" data-judul="Desain Poster Kreatif" data-deskripsi="Deskripsi lomba desain poster..." data-ketentuan="Ketentuan desain..." data-mulai="2025-07-01" data-selesai="2025-07-15" data-deadline="2025-07-10" data-penyelenggara="Komunitas Kreatif" data-hadiah="Uang Tunai" data-link="https://link-desain.com" data-kategori="desain" data-poster="poster-desain.jpg">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus lomba ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Lomba Menulis Cerpen</td>
                                        <td>Penulisan</td>
                                        <td>2025-06-30</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#lombaFormModal" data-id="2" data-judul="Lomba Menulis Cerpen" data-deskripsi="Deskripsi lomba cerpen..." data-ketentuan="Ketentuan cerpen..." data-mulai="2025-06-15" data-selesai="2025-06-30" data-deadline="2025-06-25" data-penyelenggara="Pena Muda" data-hadiah="Beasiswa" data-link="https://link-cerpen.com" data-kategori="penulisan" data-poster="poster-cerpen.jpg">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus lomba ini?')"><i class="fas fa-trash"></i> Hapus</a>
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
    <div class="modal fade" id="lombaFormModal" tabindex="-1" aria-labelledby="lombaFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lombaFormModalLabel">Tambah Lomba Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="lombaForm" action="../proses/upload_lomba_proses.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="lomba_id" id="lomba_id"> <div class="mb-3">
                            <label for="judul_lomba" class="form-label">Judul Lomba</label>
                            <input type="text" class="form-control" id="judul_lomba" name="judul_lomba" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Lomba</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ketentuan" class="form-label">Ketentuan Lomba</label>
                            <textarea class="form-control" id="ketentuan" name="ketentuan" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="deadline_pendaftaran" class="form-label">Deadline Pendaftaran</label>
                                <input type="date" class="form-control" id="deadline_pendaftaran" name="deadline_pendaftaran" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="penyelenggara" class="form-label">Penyelenggara</label>
                            <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" required>
                        </div>
                        <div class="mb-3">
                            <label for="hadiah" class="form-label">Hadiah</label>
                            <input type="text" class="form-control" id="hadiah" name="hadiah">
                        </div>
                        <div class="mb-3">
                            <label for="link_pendaftaran" class="form-label">Link Pendaftaran</label>
                            <input type="url" class="form-control" id="link_pendaftaran" name="link_pendaftaran" placeholder="Contoh: https://form.google.com/lomba">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="desain">Desain</option>
                                <option value="penulisan">Penulisan</option>
                                <option value="olahraga">Olahraga</option>
                                <option value="sains">Sains</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="poster_lomba" class="form-label">Poster Lomba</label>
                            <input class="form-control" type="file" id="poster_lomba" name="poster_lomba" accept="image/*">
                            <small class="text-muted" id="current_poster_text">Poster saat ini: -</small>
                            <input type="hidden" name="current_poster" id="current_poster">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" id="submitFormBtn">Simpan Lomba</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function() {
            document.getElementById("wrapper").classList.toggle("toggled");
        });

        // JavaScript untuk menangani modal form (mengisi data saat mode edit)
        var lombaFormModal = document.getElementById('lombaFormModal');
        lombaFormModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Tombol yang memicu modal
            var modalTitle = lombaFormModal.querySelector('.modal-title');
            var form = lombaFormModal.querySelector('#lombaForm');
            var submitBtn = lombaFormModal.querySelector('#submitFormBtn');

            // Reset form saat modal dibuka (untuk memastikan form bersih jika dibuka dari tombol 'Tambah')
            form.reset();
            lombaFormModal.querySelector('#lomba_id').value = '';
            lombaFormModal.querySelector('#current_poster_text').innerText = 'Poster saat ini: -';
            lombaFormModal.querySelector('#current_poster').value = '';
            modalTitle.textContent = 'Tambah Lomba Baru';
            submitBtn.textContent = 'Simpan Lomba';


            // Cek apakah tombol yang diklik adalah tombol 'Edit'
            if (button.hasAttribute('data-id')) {
                modalTitle.textContent = 'Edit Lomba';
                submitBtn.textContent = 'Update Lomba';

                // Ambil data dari atribut data-* tombol
                var id = button.getAttribute('data-id');
                var judul = button.getAttribute('data-judul');
                var deskripsi = button.getAttribute('data-deskripsi');
                var ketentuan = button.getAttribute('data-ketentuan');
                var mulai = button.getAttribute('data-mulai');
                var selesai = button.getAttribute('data-selesai');
                var deadline = button.getAttribute('data-deadline');
                var penyelenggara = button.getAttribute('data-penyelenggara');
                var hadiah = button.getAttribute('data-hadiah');
                var link = button.getAttribute('data-link');
                var kategori = button.getAttribute('data-kategori');
                var poster = button.getAttribute('data-poster'); // Nama file poster saat ini

                // Isi form dengan data
                lombaFormModal.querySelector('#lomba_id').value = id;
                lombaFormModal.querySelector('#judul_lomba').value = judul;
                lombaFormModal.querySelector('#deskripsi').value = deskripsi;
                lombaFormModal.querySelector('#ketentuan').value = ketentuan;
                lombaFormModal.querySelector('#tanggal_mulai').value = mulai;
                lombaFormModal.querySelector('#tanggal_selesai').value = selesai;
                lombaFormModal.querySelector('#deadline_pendaftaran').value = deadline;
                lombaFormModal.querySelector('#penyelenggara').value = penyelenggara;
                lombaFormModal.querySelector('#hadiah').value = hadiah;
                lombaFormModal.querySelector('#link_pendaftaran').value = link;
                lombaFormModal.querySelector('#kategori').value = kategori;
                if (poster && poster !== 'null') { // Pastikan poster tidak null
                    lombaFormModal.querySelector('#current_poster_text').innerText = 'Poster saat ini: ' + poster;
                    lombaFormModal.querySelector('#current_poster').value = poster;
                } else {
                    lombaFormModal.querySelector('#current_poster_text').innerText = 'Poster saat ini: Belum ada';
                    lombaFormModal.querySelector('#current_poster').value = '';
                }
            }
        });
    </script>
    <script src="../assets/js/script.js"></script>
</body>
</html>