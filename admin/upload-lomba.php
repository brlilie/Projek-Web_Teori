<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<?php
require_once '../config/db.php';
$result = $conn->query("SELECT * FROM daftar_lomba ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Lomba - Admin LombaApps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
                            <?php if ($result->num_rows > 0): ?>
                                <?php $no = 1; ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($row['judul_lomba']) ?></td>
                                        <td><?= ucfirst($row['kategori']) ?></td>
                                        <td><?= $row['deadline_pendaftaran'] ?></td>
                                        <td>
                                            <?php
                                                // Logika status aktif: jika deadline belum lewat
                                                $today = date('Y-m-d');
                                                $status = ($row['deadline_pendaftaran'] >= $today) ? 'Aktif' : 'Tutup';
                                                $badgeClass = ($status === 'Aktif') ? 'bg-success' : 'bg-secondary';
                                            ?>
                                            <span class="badge <?= $badgeClass ?>"><?= $status ?></span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm me-1"
                                                data-bs-toggle="modal"
                                                data-bs-target="#lombaFormModal"
                                                data-id="<?= $row['id_lomba'] ?>"
                                                data-judul="<?= htmlspecialchars($row['judul_lomba'], ENT_QUOTES) ?>"
                                                data-deskripsi="<?= htmlspecialchars($row['deskripsi'], ENT_QUOTES) ?>"
                                                data-ketentuan="<?= htmlspecialchars($row['ketentuan'], ENT_QUOTES) ?>"
                                                data-mulai="<?= $row['tanggal_mulai'] ?>"
                                                data-selesai="<?= $row['tanggal_selesai'] ?>"
                                                data-deadline="<?= $row['deadline_pendaftaran'] ?>"
                                                data-penyelenggara="<?= htmlspecialchars($row['penyelenggara'], ENT_QUOTES) ?>"
                                                data-hadiah="<?= htmlspecialchars($row['hadiah'], ENT_QUOTES) ?>"
                                                data-kategori="<?= $row['kategori'] ?>"
                                                data-poster="<?= $row['poster_lomba'] ?>"
                                            >
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <a href="../proses/hapus_lomba.php?id=<?= $row['id_lomba'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus lomba ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada lomba yang ditambahkan.</td>
                                </tr>
                            <?php endif; ?>
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
                        <form id="lombaForm" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="form_mode" id="form_mode" value="tambah"> 
                            <input type="hidden" name="id_lomba" id="lomba_id">
                            <input type="hidden" name="current_poster" id="current_poster">

                            <label for="judul_lomba" class="form-label">Judul Lomba</label>
                            <input type="text" class="form-control" id="judul_lomba" name="judul_lomba" required>
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
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="desain">Desain</option>
                                <option value="it">IT</option>
                                <option value="cyber">Cyber</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="poster_lomba" class="form-label">Poster Lomba</label>
                            <input class="form-control" type="file" id="poster_lomba" name="poster_lomba" accept="image/*">
                            <small class="text-muted" id="current_poster_text">Poster saat ini: -</small>
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
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("sidebarToggle").addEventListener("click", function () {
        document.getElementById("wrapper").classList.toggle("toggled");
    });

    const lombaFormModal = document.getElementById('lombaFormModal');

    lombaFormModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const form = document.getElementById('lombaForm');
        const modalTitle = lombaFormModal.querySelector('.modal-title');
        const submitBtn = lombaFormModal.querySelector('#submitFormBtn');

        const isEdit = button && button.hasAttribute('data-id');

        if (isEdit) {
            // Mode Edit
            form.action = "../proses/update_lomba_proses.php";
            form.querySelector('#form_mode').value = 'edit';
            modalTitle.textContent = 'Edit Lomba';
            submitBtn.textContent = 'Update Lomba';

            form.querySelector('#lomba_id').value = button.getAttribute('data-id');
            form.querySelector('#judul_lomba').value = button.getAttribute('data-judul');
            form.querySelector('#deskripsi').value = button.getAttribute('data-deskripsi');
            form.querySelector('#ketentuan').value = button.getAttribute('data-ketentuan');
            form.querySelector('#tanggal_mulai').value = button.getAttribute('data-mulai');
            form.querySelector('#tanggal_selesai').value = button.getAttribute('data-selesai');
            form.querySelector('#deadline_pendaftaran').value = button.getAttribute('data-deadline');
            form.querySelector('#penyelenggara').value = button.getAttribute('data-penyelenggara');
            form.querySelector('#hadiah').value = button.getAttribute('data-hadiah');
            form.querySelector('#kategori').value = button.getAttribute('data-kategori');

            const poster = button.getAttribute('data-poster');
            if (poster && poster !== 'null') {
                form.querySelector('#current_poster_text').innerText = 'Poster saat ini: ' + poster;
                form.querySelector('#current_poster').value = poster;
            } else {
                form.querySelector('#current_poster_text').innerText = 'Poster saat ini: Belum ada';
                form.querySelector('#current_poster').value = '';
            }
        } else {
            // Mode Tambah
            form.reset();
            form.action = "../proses/upload_lomba_proses.php";
            form.querySelector('#form_mode').value = 'tambah';
            form.querySelector('#lomba_id').value = '';
            form.querySelector('#current_poster_text').innerText = 'Poster saat ini: -';
            form.querySelector('#current_poster').value = '';
            modalTitle.textContent = 'Tambah Lomba Baru';
            submitBtn.textContent = 'Simpan Lomba';
        }
    });
});
</script>
<script src="../assets/js/script.js"></script>
</body>
</html>
