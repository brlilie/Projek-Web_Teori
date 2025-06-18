
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
?>
<?php
require_once('../config/db.php');
$kategoriQuery = mysqli_query($conn, "SELECT id_lomba, judul_lomba FROM daftar_lomba");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <link rel="stylesheet" href="../assets/css/fitur.css">
  <link rel="stylesheet" href="../assets/css/style.css">

  <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">

    <title>Daftar Lomba</title>
</head>
<body>
<?php require_once('../layout/navbar.php'); ?>
  <section>
    <div class="card-transparent">
    <form action="../proses/daftar_proses.php" method="post" enctype="multipart/form-data" class="form-pendaftaran">
    <h2>Form Pendaftaran Lomba</h2>

    <label for="nama_tim">Nama Tim</label>
    <input type="text" id="nama_tim" name="nama_tim" required>

    <label for="institusi">Asal Institusi</label>
    <input type="text" id="institusi" name="institusi" required>

    <label for="nama_ketua">Nama Ketua Tim</label>
    <input type="text" id="nama_ketua" name="nama_ketua" required>

    <label for="email">Email Aktif</label>
    <input type="email" id="email" name="email" required>

    <label for="whatsapp">Nomor WhatsApp</label>
    <input type="tel" id="whatsapp" name="whatsapp" required>

    <label for="kategori">Kategori Lomba</label>
    <select id="kategori" name="id_lomba" required>
        <option value="">-- Pilih Kategori --</option>
        <?php while($kategori = mysqli_fetch_assoc($kategoriQuery)): ?>
            <option value="<?= $kategori['id_lomba'] ?>">
                <?= htmlspecialchars($kategori['judul_lomba']) ?>
            </option>
        <?php endwhile; ?>
    </select>
    <label for="bukti_pembayaran">Upload Bukti Pembayaran (PDF/JPG/PNG)</label>
    <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept=".pdf,.jpg,.jpeg,.png" required>

    <label>
        <input type="checkbox" name="agree" required>
        Saya menyetujui syarat dan ketentuan lomba
    </label>

    <button type="submit">Daftar Sekarang</button>
</form>


    </div>
  </section>
</body>
</html>
