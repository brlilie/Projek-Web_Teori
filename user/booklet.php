<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
require_once('../config/db.php'); 

$sql = "SELECT daftar_lomba.id_lomba, daftar_lomba.judul_lomba, daftar_lomba.deskripsi, daftar_lomba.poster_lomba, booklet.file_path 
        FROM daftar_lomba 
        LEFT JOIN booklet ON daftar_lomba.id_lomba = booklet.id_lomba";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Booklet Lomba</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/booklet.css">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to bottom right, #2c2caa, #ec38bc);
      min-height: 100vh;
    }
    .card-img-top {
      height: 150px;
      object-fit: cover;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }
  </style>
</head>
<body>

<?php require_once('../layout/navbar.php'); ?>

<div class="container py-5">
  <div class="row gx-3 gy-4 justify-content-center">

  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="col-md-4">
      <div class="card h-100 shadow" style="border-radius: 12px;">
        <!-- Gambar Poster -->
        <?php 
          $poster = !empty($row['poster_lomba']) 
              ? '../assets/images/' . htmlspecialchars($row['poster_lomba']) 
              : '../assets/images/default.jpg'; 
        ?>
        <img src="<?= $poster ?>" alt="Poster <?= htmlspecialchars($row['judul_lomba']) ?>" class="card-img-top">

        <div class="card-body d-flex flex-column">
          <h5 class="card-title fw-bold"><?= htmlspecialchars($row['judul_lomba']) ?></h5>

          <!-- Potong deskripsi (max 20 kata) -->
          <p class="card-text">
            <?php
              $words = explode(' ', strip_tags($row['deskripsi']));
              $preview = implode(' ', array_slice($words, 0, 20));
              echo htmlspecialchars($preview) . (count($words) > 20 ? '...' : '');
            ?>
          </p>

          <div class="mt-auto d-flex justify-content-between">
            <!-- Tombol Selengkapnya -->
            <button class="btn-dua" 
                    data-bs-toggle="modal" 
                    data-bs-target="#detailModal"
                    data-judul="<?= htmlspecialchars($row['judul_lomba']) ?>"
                    data-deskripsi="<?= htmlspecialchars($row['deskripsi']) ?>"
                    data-file="<?= htmlspecialchars($row['file_path']) ?>"
                    data-poster="<?= htmlspecialchars($row['poster_lomba']) ?>">
                    
              Selengkapnya
            </button>
        
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
</div>

<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="detailModalLabel">Judul Lomba</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body px-4 py-3">
        <img id="modalPoster" src="" alt="Poster Lomba" class="img-fluid rounded mb-3" style="max-height: 300px; object-fit: cover;">
        <p id="modalDeskripsi" class="text-justify"></p>
      </div>
      <div class="d-flex justify-content-end px-4 pb-4">
        <a href="#" id="modalUnduhBtn" class="btn-dua" download style="display: none;">
          📄 Unduh Booklet
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const detailModal = document.getElementById('detailModal');
  const modalUnduhBtn = document.getElementById('modalUnduhBtn');
  const modalPoster = document.getElementById('modalPoster');

  detailModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const judul = button.getAttribute('data-judul');
    const deskripsi = button.getAttribute('data-deskripsi');
    const filePath = button.getAttribute('data-file');
    const poster = button.getAttribute('data-poster');

    // Set isi modal
    detailModal.querySelector('.modal-title').textContent = judul;
    detailModal.querySelector('#modalDeskripsi').textContent = deskripsi;

    // Set gambar poster
    if (poster && poster.trim() !== '') {
      modalPoster.src = '../assets/images/' + encodeURIComponent(poster);
    } else {
      modalPoster.src = '../assets/images/default.jpg';
    }

    // Atur tombol download
    if (filePath && filePath.trim() !== '') {
      modalUnduhBtn.href = '../assets/booklet/' + encodeURIComponent(filePath);
      modalUnduhBtn.style.display = 'inline-block';
    } else {
      modalUnduhBtn.style.display = 'none';
    }
  });
});

</script>


</body>
</html>
