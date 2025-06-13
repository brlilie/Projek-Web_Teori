<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
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

    <title>Home</title>
</head>
<body>
<?php require_once('../layout/navbar.php'); ?>

<section class="hero-section position-relative text-white d-flex align-items-center justify-content-center text-center">
<div class="container">
    <h1 class="display-4">Lombain 1.0</h1>
    <p class="lead">Lima Cabang Lomba di Bidang IT untuk SMA/MA dan Mahasiswa</p>
  </div>

  <div class="wave-bottom">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
      <path fill="#FFFFFF" fill-opacity="1"
        d="M0,160L80,170C160,180,320,200,480,186.7C640,173,800,107,960,106.7C1120,107,1280,173,1360,205.3L1440,237.3V320H0Z">
      </path>
    </svg>
  </div>
</section>

<section style="background: #FFFFFF;">
<h2 style="text-align: center;">User Interface dan User Experience Design</h2>
<div class="card" style="background-color: #333; color: white;"> 
            <div class="content-container">
                <div class="poster">
                <img src="poster.png" alt="Poster Lomba" />
                </div>
                <div class="cen-layout">
                        <div class="info">
                            <h3>Deskripsi Lomba</h3>
                            <p>Lomba UI/UX Design 2025 adalah ajang kompetisi kreatif yang menantang peserta untuk merancang solusi digital dengan antarmuka pengguna yang menarik dan pengalaman pengguna yang optimal. Kompetisi ini bertujuan untuk mengasah kemampuan desain digital generasi muda dalam menciptakan produk yang fungsional dan user-friendly. Tersedia hadiah jutaan rupiah serta kesempatan untuk memamerkan karya terbaik kepada para profesional industri!</p>
                            <h3>Ketentuan Lomba</h3>
                            <p>Kompetisi ini terbuka untuk pelajar SMA/sederajat dan mahasiswa aktif dari seluruh Indonesia. Peserta dapat mengikuti lomba secara individu atau dalam tim berisi maksimal 3 orang. Setiap peserta wajib mengirimkan hasil desain dalam format yang telah ditentukan panitia dan mengikuti seluruh tahapan seleksi yang berlaku</p>
                            <h3>Tanggal Pendaftaran</h3>
                            <p>Pendaftaran dibuka mulai tanggal <strong>3 Juni 2025</strong> dan ditutup pada <strong>30 Juni 2025</strong>. Pastikan kamu mendaftar sebelum batas waktu dan mempersiapkan karya terbaikmu!</p>
                        </div>
                        <a href="daftar_lomba.php" class="btn-next">Daftar Sekarang</a>
                </div>
            </div>
    </div>
</section>

<section style="background: #FFFFFF;">
  <h2 style="text-align: center;">Cyber Security</h2>
  <div class="card" style="background-color: #333; color: white;"> 
    <div class="content-container">
      <div class="poster">
        <img src="poster.png" alt="Poster Lomba" />
      </div>
      <div class="cen-layout">
        <div class="info">
          <h3>Deskripsi Lomba</h3>
          <p>
            Lomba Cyber Security merupakan ajang kompetisi yang dirancang untuk menguji kemampuan peserta dalam mengidentifikasi, menganalisis, dan menangani ancaman keamanan siber. Peserta akan dihadapkan pada berbagai studi kasus dan simulasi serangan siber untuk menguji pengetahuan teknis dan strategis mereka di bidang keamanan informasi. Lomba ini terbuka bagi pelajar, mahasiswa, maupun umum yang memiliki minat dan keahlian di bidang teknologi dan keamanan digital.
          </p>

          <h3>Ketentuan Lomba</h3>
          <ul style="color: white;">
            <li>Peserta dapat mengikuti lomba secara individu atau tim (maksimal 3 orang).</li>
            <li>Peserta wajib membawa laptop pribadi dengan perangkat lunak yang telah ditentukan panitia.</li>
            <li>Setiap peserta harus menyelesaikan tantangan dalam waktu yang telah ditentukan.</li>
            <li>Plagiarisme atau kerja sama antar tim yang tidak sah akan didiskualifikasi.</li>
            <li>Keputusan dewan juri bersifat mutlak dan tidak dapat diganggu gugat.</li>
          </ul>

          <h3>Tanggal Pendaftaran</h3>
          <p>
            Pembukaan Pendaftaran: 10 Juni 2025<br>
            Penutupan Pendaftaran: 25 Juni 2025<br>
            Pengumuman Peserta Lolos Seleksi: 28 Juni 2025<br>
            Pelaksanaan Lomba: 1 Juli 2025
          </p>
        </div>
        <a href="daftar_lomba.php" class="btn-next">Daftar Sekarang</a>
      </div>
    </div>
  </div>
</section>


</body>
</html>
