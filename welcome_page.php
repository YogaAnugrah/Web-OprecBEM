<?php
session_start();
if (!isset($_SESSION['id_user'])) {
  header("location:login.php");
}
if (isset($_SESSION['level'])) {
    $level = $_SESSION['level'];
    if ($level == 'Supervisor') {
header("location:spv.php");
}
elseif ($level == 'Admin') {
header("location:admin.php");
}
  }
  
include 'functions.php';
global $conn;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aplikasi Open Recruitment | BEM POLINELA </title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="image/bemlogo.png" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/bemlogo.png" alt="">
        <span>Oprec</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#values">Visi & Misi</a></li>
          <li><a class="nav-link scrollto" href="#faq">F.A.Q</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <li><a class="getstarted scrollto" href="register_mhs.php">Daftar</a></li>
          <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://rcmi.fiu.edu/wp-content/uploads/sites/30/2018/02/no_user.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="profil.php?<?= $_SESSION['id_user'];?>">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Selamat datang di Aplikasi Open Recruitment Staff BEM</h1><br>
          <h5 align="justify" data-aos="fade-up" data-aos-delay="400">Selamat datang di Aplikasi Open Recruitment Staff Badan Eksekutif Mahasiswa
          Politeknik Negeri Lampung. Mari bergabung menjadi bagian dari Badan Eksekutif Mahasiswa Politeknik Negeri Lampung dan raih
        prestasi bersama kami!  </h5>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="register_mhs.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Bergabung Sekarang</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Tentang BEM</h3>
              <h2>Badan Eksekutif Mahasiswa</h2>
              <p>
                Badan Eksekutif Mahasiswa adalah sebuah Lembaga Kemahasiswaan yang berada di dalam Kampus. Lembaga ini dipimpin Oleh Seorang Presiden Mahasiswa dan Wakil Presiden Mahasiswa. Berdirinya Organisasi ini berdasarkan dari Peran dan Fungsi Mahasiswa. Adapun Kementerian yang Membantu Presiden dan Wakil Presiden dalam menjalankan Tugas Pokok dan Fungsinya sebanyak 12 Kementerian.
              </p>
              <div class="text-center text-lg-start">
                <a href="kementerian.php" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Selengkapnya</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values align-items-center">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Our Values</h2>
          <p>Visi & Misi</p>
        </header>

        <div class="row">

          <div class="col-lg-4 mx-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="assets/img/values-1.png" class="img-fluid" alt="">
              <h3>Visi</h3>
              <p align="justify">Menjadikan KBM POLINELA yang Ber-IDE (Inovatif, Dekat, Elaborasi).</p>
            </div>
          </div>

            <div class="col-lg-4  mx-auto" data-aos="fade-up" data-aos-delay="400">
           <div class="box">
              <img src="assets/img/values-2.png" class="img-fluid" alt="">
              <h3>Misi</h3>
              <ul align = "left">
                <li class="mt-2">Mendengar suara dari berbagai elemen mahasiswa</li>
                <li class="mt-2">Merajut sinergi sebagai pondasi kerja organisasi</li>
                <li class="mt-2">Menyajikan Karya sebagai kontribusi nyata</li>
                <li class="mt-2">Menciptakan ruang diskusi sebagai bentuk penyampaian aspirasi dan solusi</li>
              </ul>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </header>

        <div class="row">
          <div class="col-lg-6">
            <!-- F.A.Q List 1-->
            <div class="accordion accordion-flush" id="faqlist1">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    Untuk lolos seleksi titik berat penilaiannya di bagian mana ya kak?
                  </button>
                </h2>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    Kelengkapan berkas yang teman-teman semua masukkan harus sesuai dengan ketentuan yang sudah tertera di pamflet.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    Tahun lalu yang ke terima persentasenya berapa ya kak dari jumlah yang mendaftar?
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    Persentase yang ke terima tahun lalu 37.5% dari jumlah pendaftar.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    Masa bakti BEM 1 periode berapa lama ya kak?
                  </button>
                </h2>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    1 periode itu 1 tahun, tapi kalau staff muda 1/4 periode. Meskipun hanya sebentar pengalaman dan hal yang di dapat banyak banget.
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-lg-6">

            <!-- F.A.Q List 2-->
            <div class="accordion accordion-flush" id="faqlist2">

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                    CV yang dikirim itu contohnya bagaimana ya kak?
                  </button>
                </h2>
                <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    CV apa saja yang penting sesuai dengan persyaratan yang tertera.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                    Jumlah yang diterima untuk jadi calon anggota staff BEM kira-kira berapa orang ya kak per-kementeriannya? 
                  </button>
                </h2>
                <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    Tahun lalu sekitar 5-7 orang, tapi bisa juga lebih banyak.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                    Sertifikat penghargaan diganti dengan surat pernyataan menjabat ketua OSIS boleh tidak kak?
                  </button>
                </h2>
                <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    Boleh, tapi di bagian riwayat organisasi bisa di cantumkan juga ya.
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>

    </section><!-- End F.A.Q Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Kontak</h2>
          <p>Hubungi Kami</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6 mx-auto">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  <p>Jalan Soekarno Hatta N0.10 Rajabasa<br>Bandar Lampung, Kode Pos 35144</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Contact Person</h3>
                  <p>Presiden Mahasiswa : <br> Adil Dharma Wibowo (+6282215484843)<br><br>
                    Menteri PSDM : <br> Angellina Anggraini Sinulingga (+6285954155266)</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email</h3>
                  <p>bem@polinela.ac.id</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-instagram mx-2"></i>
                  <i class="bi bi-twitter mx-2"></i>
                  <i class="bi bi-facebook mx-2"></i>
                  <h3>Sosial Media</h3>
                  <p>@bemkbmpolinela</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-youtube"></i>
                  <h3>Youtube</h3>
                  <p>BEM KBM POLINELA</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-disc"></i>
                  <h3>Website</h3>
                  <p>bem.kemahasiswaan.polinela.ac.id</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Sekertariat</h3>
                  <p>Hari kerja (Senin-Jum'at)<br>9:00AM - 21:00PM</p>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/bemlogo.png" alt="">
        <span>Open Recruitment BEM</span>
      </a>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Tautan Halaman</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#hero">Beranda</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#about">Tentang</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#values">Visi & Misi</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#faq">F.A.Q</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Alamat</h4>
            <p>Jalan Soekarno Hatta N0.10 Rajabasa<br>Bandar Lampung, Kode Pos 35144</p><br>
              <strong>Contact Person </strong> <p>Presiden Mahasiswa : <br> Adil Dharma Wibowo (+6282215484843)<br><br>
                    Menteri PSDM : <br> Angellina Anggraini Sinulingga (+6285954155266)</p><br>
              <strong>Email:</strong> bem@polinela.ac.id<br>
            </p>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Polinela</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="/">Kelompok 1
        </a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>