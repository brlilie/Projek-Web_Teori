<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Booklet Lomba</title>
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <style>
    /* Reset dan gaya dasar */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #312A77, #822EA4, #D332D0, #E96AE7, #796CFF);
      min-height: 100vh;
      /* display: flex;
      flex-direction: column;
      justify-content: center; */
      align-items: center;
      padding: 40px 20px;
    }

    .container {
      max-width: 1200px;
      width: 100%;
      text-align: center;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 30px 40px;
    }

    .card {
      background-color: white;
      border-radius: 15px;
      display: flex;
      align-items: center;
      padding: 20px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .image-placeholder {
      width: 100px;
      height: 120px;
      background-color: #a78b8b;
      border-radius: 10px;
      flex-shrink: 0;
      margin-right: 20px;
    }

    .card-content {
      flex: 1;
      text-align: left;
    }

    .card-content h3 {
      font-size: 16px;
      font-weight: 600;
      color: #333;
      margin-bottom: 6px;
    }

    .card-content p {
      font-size: 14px;
      margin-bottom: 15px;
      color: #555;
    }

    .card-content button {
      background-color: #2e2579;
      color: white;
      padding: 8px 20px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      font-size: 14px;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }

    .card-content button:hover {
      background-color: #1e1a5e;
    }

    /* Overlay Popup */
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0,0,0,0.6);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .overlay.active {
      display: flex;
    }

    .popup-card {
      background-color: white;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      display: flex;
      max-width: 900px;
      width: 90%;
      padding: 30px;
      gap: 30px;
      position: relative;
      animation: fadeIn 0.3s ease-in-out;
    }

    .popup-image {
      width: 250px;
      height: 320px;
      background-color: #a78b8b;
      border-radius: 12px;
      flex-shrink: 0;
    }

    .popup-info {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      text-align: left;
    }

    .popup-info h3 {
      font-size: 22px;
      color: #2e2579;
      margin-bottom: 10px;
    }

    .popup-info p {
      font-size: 15px;
      color: #333;
      margin-bottom: 20px;
      line-height: 1.6;
    }

    .btn-unduh, .btn-tutup {
      background-color: #2e2579;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border: none;
      border-radius: 12px;
      font-size: 15px;
      cursor: pointer;
      transition: background 0.3s ease;
      width: fit-content;
    }

    .btn-unduh:hover, .btn-tutup:hover {
      background-color: #1d1b59;
    }

    .btn-tutup {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 14px;
      padding: 6px 12px;
      background-color: #e74c3c;
    }

    .btn-tutup:hover {
      background-color: #c0392b;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }
  </style>
</head>
<body>
<?php include '../layout/navbar.php'; ?>
  <div class="container">
    <div class="card-grid">
      <!-- Ulangi kartu -->
      <div class="card">
        <div class="image-placeholder"></div>
        <div class="card-content">
          <h3>Booklet-Judul Lomba</h3>
          <p>Deskripsi singkat lomba.</p>
          <button onclick="tampilkanPopup()">Selengkapnya</button>
        </div>
      </div>

      <!-- Salin 5 kali untuk 6 total -->
      <div class="card">
        <div class="image-placeholder"></div>
        <div class="card-content">
          <h3>Booklet-Judul Lomba</h3>
          <p>Deskripsi singkat lomba.</p>
          <button onclick="tampilkanPopup()">Selengkapnya</button>
        </div>
      </div>

      <div class="card">
        <div class="image-placeholder"></div>
        <div class="card-content">
          <h3>Booklet-Judul Lomba</h3>
          <p>Deskripsi singkat lomba.</p>
          <button onclick="tampilkanPopup()">Selengkapnya</button>
        </div>
      </div>

      <div class="card">
        <div class="image-placeholder"></div>
        <div class="card-content">
          <h3>Booklet-Judul Lomba</h3>
          <p>Deskripsi singkat lomba.</p>
          <button onclick="tampilkanPopup()">Selengkapnya</button>
        </div>
      </div>

      <div class="card">
        <div class="image-placeholder"></div>
        <div class="card-content">
          <h3>Booklet-Judul Lomba</h3>
          <p>Deskripsi singkat lomba.</p>
          <button onclick="tampilkanPopup()">Selengkapnya</button>
        </div>
      </div>

      <div class="card">
        <div class="image-placeholder"></div>
        <div class="card-content">
          <h3>Booklet-Judul Lomba</h3>
          <p>Deskripsi singkat lomba.</p>
          <button onclick="tampilkanPopup()">Selengkapnya</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Overlay Popup -->
  <div class="overlay" id="popupOverlay">
    <div class="popup-card">
      <button class="btn-tutup" onclick="tutupPopup()">X</button>
      <div class="popup-image"></div>
      <div class="popup-info">
        <h3>Judul Lomba Lengkap</h3>
        <p>Ini adalah deskripsi lengkap dari lomba yang bisa panjang, berisi informasi penting seperti ketentuan, waktu, tempat, syarat pendaftaran, dan link download.</p>
        <button class="btn-unduh">Unduh Booklet</button>
      </div>
    </div>
  </div>

  <script>
    function tampilkanPopup() {
      document.getElementById('popupOverlay').classList.add('active');
    }

    function tutupPopup() {
      document.getElementById('popupOverlay').classList.remove('active');
    }
  </script>
</body>
</html>
