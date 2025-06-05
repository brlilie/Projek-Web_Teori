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
      background-color: #b19797;
      height: 150px;
    }
  </style>
</head>
<body>

<?php require_once('../layout/navbar.php'); ?>

<div class="container py-5">
  <div class="row gx-2 gy-4">

    <div class="col-md-4">
      <div class="card">
        <div class="card-img-top"></div>
        <div class="card-body">
          <h5 class="card-title fw-bold">UI UX Designer</h5>
          <p class="card-text">Lomba ini menantang peserta untuk merancang antarmuka dan pengalaman pengguna aplikasi digital yang fungsional, estetis.</p>
          <button class="btn-dua" data-bs-toggle="modal" data-bs-target="#lombasatu">Selengkapnya</button> 
          <!-- iniii kan card 1-->
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <div class="card-img-top"></div>
        <div class="card-body">
          <h5 class="card-title fw-bold">Cyber Security</h5>
          <p class="card-text">Lomba ini menguji kemampuan peserta dalam keamanan siber, mulai dari cryptography, digital forensics, hingga ethical hacking.</p>
          <button class="btn-dua" data-bs-toggle="modal" data-bs-target="#lombadua">Selengkapnya</button>
        </div>
      </div>
    </div>


  </div>
</div>


<div class="modal fade" id="lombasatu" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupModalLabel">UI UX</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
<div class="modal-body">
  <div class="mb-3" style="background:#b19797; height: 200px;"></div>
  <p>
    🎨 <strong>Lomba UI/UX Designer</strong><br>
    Lomba ini menantang peserta untuk merancang antarmuka dan pengalaman pengguna aplikasi digital yang fungsional, estetis, dan ramah pengguna. Terbuka untuk individu atau tim (maks. 3 orang). Peserta akan mengerjakan studi kasus dan membuat prototype berdasarkan brief yang diberikan.<br><br>
    📅 <strong>Pendaftaran:</strong> 10 Juni – 1 Juli 2025<br>
    🗓️ <strong>Pengumpulan Karya:</strong> 8 Juli 2025<br>
    🏆 <strong>Final Presentasi:</strong> 14 Juli 2025 (Online)<br><br>
    🎁 Total hadiah hingga <strong>Rp7 juta</strong>!<br>
    📩 Info: <a href="mailto:uiuxlomba@utindonesia.ac.id">uiuxlomba@utindonesia.ac.id</a><br>
  </p>
</div>
      <div class="modal-footer">
        <button class="btn-dua">Unduh Booklet</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="lombadua" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupModalLabel">Cyber Security</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
  <div class="mb-3" style="background:#b19797; height: 200px;"></div>
  <p>
    🛡️ <strong>Lomba Cyber Security</strong><br>
    Lomba ini menguji kemampuan peserta dalam keamanan siber, mulai dari cryptography, digital forensics, hingga ethical hacking. Terbuka untuk individu atau tim maksimal 3 orang. Babak penyisihan online, dan final offline di Universitas Teknologi Indonesia.<br><br>
    📅 <strong>Pendaftaran:</strong> 10 Juni – 1 Juli 2025<br>
    🗓️ <strong>Penyisihan:</strong> 5 Juli 2025 (Online)<br>
    🏆 <strong>Final:</strong> 13 Juli 2025 (On-site)<br>
    📍 <strong>Tempat:</strong> Auditorium Fasilkom, Universitas Teknologi Indonesia<br><br>
    🎁 Total hadiah hingga <strong>Rp10 juta</strong>!<br>
    📩 Info: <a href="mailto:cyberlomba@utindonesia.ac.id">cyberlomba@utindonesia.ac.id</a><br>
  </p>
</div>
      <div class="modal-footer">
        <button class="btn-dua">Unduh Booklet</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
