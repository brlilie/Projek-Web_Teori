<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pendaftaran Berhasil</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">



  <style>
    body {
      background: linear-gradient(135deg, #312A77, #822EA4, #D332D0, #E96AE7, #796CFF);
      min-height: 100vh;
      margin: 0;
      font-family: 'Inter', sans-serif;
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card-success {
      background-color: #ffffffee;
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      max-width: 450px;
      text-align: center;
      animation: fadeIn 0.8s ease;
    }

    .card-success h2 {
      font-weight: 700;
      color: #312A77;
    }

    .card-success p {
      color: #444;
    }

    .success-icon {
      font-size: 4rem;
      color: #4BB543;
    }

    .btn-back {
      margin-top: 20px;
      background: #312A77;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 10px 20px;
      transition: background 0.3s ease;
    }

    .btn-back:hover {
      background: #5c4ab1;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <?php require_once('../layout/navbar.php'); ?>

  <main>
    <div class="card-success">
      <div class="success-icon">✅</div>
      <h2>Pendaftaran Berhasil!</h2>
      <p>Terima kasih telah mendaftar. Kami akan segera menghubungi kamu melalui email atau WhatsApp.</p>
      <a href="../user/home.php" class="btn btn-back">Kembali ke Beranda</a>
    </div>
  </main>

</body>
</html>
