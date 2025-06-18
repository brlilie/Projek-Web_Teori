<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

require_once '../config/db.php';
$sql = "SELECT * FROM daftar_lomba ORDER BY tanggal_mulai DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <link rel="stylesheet" href="../assets/css/fitur.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">

  <title>Home</title>
</head>
<body>
<?php require_once('../layout/navbar.php'); ?>

<section class="hero-section position-relative text-white d-flex align-items-center justify-content-center text-center">
  <div class="container">
    <h1 class="display-4">Lombain 1.0</h1>
    <p class="lead">Scroll ke bawah untuk melihat lomba</p>
  </div>
  <div class="wave-bottom">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
      <path fill="#FFFFFF" fill-opacity="1"
        d="M0,160L80,170C160,180,320,200,480,186.7C640,173,800,107,960,106.7C1120,107,1280,173,1360,205.3L1440,237.3V320H0Z">
      </path>
    </svg>
  </div>
</section>

<?php while ($row = $result->fetch_assoc()): ?>
<section style="background: #FFFFFF;"">
  <h2 class="text-center"><?= htmlspecialchars($row['judul_lomba']) ?></h2>

  <div class="container">
    <div class="card mx-auto p-0 overflow-hidden" style="background-color: #333; color: white; max-width: 900px; border-radius: 16px; box-shadow: 0 0 15px rgba(0,0,0,0.3);">
      
      <!-- Poster di atas -->
      <div class="p-4" style="display: flex; justify-content: center;">
      <img src="../assets/images/<?= htmlspecialchars($row['poster_lomba']) ?>" 
          alt="Poster Lomba" 
          style="max-height: 300px; object-fit: cover; width: 1000px; max-width: 100%; border-radius: 5px;">
     </div>
      <!-- Info lomba -->
      <div class="p-4">
        <h3>Deskripsi Lomba 📄</h3>
        <p><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>

        <h3>Ketentuan 📌</h3>
        <p><?= nl2br(htmlspecialchars($row['ketentuan'])) ?></p>

        <h3>Tanggal 🗓️</h3>
        <p>
          Pendaftaran dibuka <strong><?= date('j F Y', strtotime($row['tanggal_mulai'])) ?></strong> 
          sampai <strong><?= date('j F Y', strtotime($row['deadline_pendaftaran'])) ?></strong>.
        </p>

        <div class="text-center mt-4">
          <a href="daftar_lomba.php?id=<?= $row['id_lomba'] ?>" 
             class="btn-next">
             Daftar Sekarang
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>

</body>
</html>
