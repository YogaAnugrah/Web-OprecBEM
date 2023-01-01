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

  <title>Informasi Kementerian | BEM POLINELA </title>
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
        <span>Informasi Kementerian</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          </ul>
        </div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="" class="faq mt-4">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Tentang</h2>
          <p>Kementerian Badan Eksekutif Mahasiswa</p>
        </header>

        <div class="row">
          <div class="col-lg-6">
            <!-- F.A.Q List 1-->
            <div class="accordion accordion-flush" id="faqlist1">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    Kementerian Sekretaris Kabinet (SEKKAB)
                  </button>
                </h2>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="card mt-4 card card-body">
    1. Kementerian yang mengatur dan bertanggung jawab atas pengelolaan manajemen kabinet meliputi administrasi, kesekretariatan, jadwal kegiatan, serta database pengurus.<br>
    2. Mendata, mengevaluasi dan mengingatkan setiap progja BEM KBM POLINELA.<br><br>
    Program Kerja : <br>
    1. Pelatihan Administrasi dan Keuangan<br><br>
    Agenda : <br>
    1. Bedah Sekret
  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    Kementerian Keuangan
                  </button>
                </h2>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="card mt-4 card card-body">
    Kementerian yang bertanggung jawab terkait pengelolaan keuangan kabinet meliputi menyusun dan membuat rencana pengendalian, rencana keuangan, penerbiatan keuangan setiap agenda, dan monitoring keuangan setiap pekan.<br><br>
    Program Kerja : <br>
    1. Pelatihan Administrasi dan Keuangan<br><br>
    Agenda : <br>
    1. Arisan Bendum (Bendahara Umum) dan Kasbul (Kas Bulanan)
  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    Kementerian Luar Negeri
                  </button>
                </h2>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                  <div class="accordion-body">
                    <div class="card mt-4 card card-body">
    Kementerian yang membangun, menjada, dan meningkatkan hubungan baik BEM KBM POLINELA dengan berbagai pihak terkait, sehingga adanya sinergitas dalam mencapai visi BEM KBM POLINELA.<br><br>
    Program Kerja : <br>
    1. Pelatihan Public Speaking<br>
    2. Pelatihan Teknik Lobby<br><br>
    Agenda : <br>
    1. Kunjungan<br>
    2. Konsolidasi<br>
    3. Kumpul Update
  </div>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    Kementerian Dalam Negeri
                  </button>
                </h2>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                    <div class="card mt-4 card card-body">
    Kementerian yang menyelenggarakan koordinasi, operasi, kolaborasi, dan harmonisasi dengan civitas akademika serta lembaga HMJ yang ada di lingkup KBM POLINELA.<br><br>
    Program Kerja : <br>
    1. Serah Terima Jabatan (Sertijab)<br>
    2. Polinela Fair<br>
    3. Pelantikan Pengurus KBM POLINELA<br>
    4. Buka Puasa Bersama<br><br>
    Agenda : <br>
    1. Safari HMJ
  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    Kementerian Pengembangan Sumber Daya Mahasiswa (PSDM
                  </button>
                </h2>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                   <div class="card mt-4 card card-body">
    Kememerian yang membuat, mengurus, dan menerapkan strategi kaderisasi, serta melakukan pemberdayaan sumber data mahasiswa melalui kolaborasi dengan Unit Kegiatan Mahasiswa dan Komunitas dalam rangka mencapai tujuan organisasi.<br><br>
    Program Kerja : <br>
    1. Upgrading Anggota BEM<br>
    2. Open Recruitment<br>
    3. Training Anggota BEM<br>
    4. Stadium General : Seminar Kebangsaan<br><br>
    Agenda : <br>
    1. Safari UKM dan Komunitas
  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-6">
                    Kementerian Advokasi Kesejahteraan Mahasiswa (ADVOKESMA)
                  </button>
                </h2>
                <div id="faq-content-6" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                   <div class="card mt-4 card card-body">
    1. Kementerian yang memberikan pelayanan, pengabdian, dan pembelaan kepada KBM POLINELA dengan berorientasi pada kebermanfaatan.<br>
    2. Menjalin komunikasi aktif dengan elemen advokasi mahasiswa yang ada dan memberikan pelayanan terpadu yang responsif dan solutif.<br><br>
    Program Kerja :<br>
    1. LKMM-TD (Latihan Kepemimpinan Manajemen Mahasiswa Tingkat Dasar)<br><br>
    Agenda :<br>
    1. Banding dan Bantuan UKT<br>
    2. Lingkar Aspirasi<br>
    3. PAM Jurusan (Pekan Aspirasi Mahasiswa Jurusan)<br>
    4. Kanal Pengajuan<br>
    5. Subsidi Kuota<br>
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
                    Kementerian Pendidikan
                  </button>
                </h2>
                <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="card mt-4 card card-body">
    Kementerian yang bertanggung jawab menyelenggarakan urusan internal dan eksternal kampus dalam upaya penyelesaian masalah pendidikan dan peningkatan kegiatan yang meningkatkan kreatifitas, kesenian, dan pengetahuan kebudayaan serta apresiasi Minat dan Bakat KBM POLINELA.<br><br>
    Program Kerja :<br>
    1. PGTS (Polinela Goes To School)<br>
    2. Seminar Nasional<br>
    3. BEM EXPO<br>
    4. Lomba Cerdas Cermat<br><br>
    Agenda :<br>
    1. Seminar atau Webinar Mahasiswa Berprestasi<br>
    2. Lomba HARDIKNAS (Hari Pendidikan Nasional)<br>
    3. Education With HMJ<br>
    4. Donasi Buku
  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                    Kementerian Sosial Pengabdian Masyarakat (SOPMA) 
                  </button>
                </h2>
                <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="card mt-4 card card-body">
    Kementerian SOPMA melakukan pengabdian dengan bergerak dan terjun langsung kedalam masyarakat dan berusaha untuk memberikan solusi terhadap problem didalam masyarakat.<br><br>
    Program Kerja :<br>
    1. Program Pemberdayaan Masyarakat Desa (Bina Desa)<br><br>
    Agenda :<br>
    1. Donor Darah<br>
    2. Bincang Asik<br>
    3. BEM Care<br>
    4. BEM Teach<br>
    5. Sopma Peduli Lingkungan
  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                   Kementerian Komunikasi & Informasi (KOMINFO) 
                  </button>
                </h2>
                <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="accordion-body">
                    <div class="card mt-4 card card-body">
    1. Kementerian yang meningkatkan sistem dan mengoptimalkan pengelolaan pesan-pesan komunikasi dan informasi seluruh kementerian di BEM KBM POLINELA. Menjadi poros media komunikasi dan informasi yang ada di lingkup KBM POLINELA dan menjalin relasi yang baik.<br>
    2. Menyediakan kebutuhan desain grafis dalam melakukan penyebaran pesan-pesan komunikasi dan informasi yang up to date dan inofatif.<br><br>
    Program Kerja :<br>
    1. School Of Media (SOM)<br><br>
    Agenda :<br>
    1. BEM Live<br>
    2. BEM Update<br>
    3. One Day Post
  </div>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-4">
                    Kementerian Kajian & Strategi (KASTRAG)
                  </button>
                </h2>
                <div id="faq2-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                   <div class="card mt-4 card card-body">
    Kementerian yang bertugas untuk mengembangkan daya kritis, daya nalar, dan kepedulian mahasiswa terhadap isu-isu regional, nasional maupun internasional.<br><br>
    Fungsi : <br>
    1. Fungsi Analisis Isu<br>
    2. Fungsi Penyikapan Isu<br>
    3. Fungsi Perencanaan Strategi Gerakan<br>
    4. Fungsi Pengembangan Wacana<br><br>
    Agenda :<br>
    1. Kobar (Kongkow Bareng)
  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-5">
                    Kementerian Aksi & Propoganda (AKSPRO) 
                  </button>
                </h2>
                <div id="faq2-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="card mt-4 card card-body">
    1. Kementerian yang menjadi poros dalam melakukan eskalasi gerakan yang sistematis dan mengagitasi massa agar tetap konsisten menjadi poros gerakan mahasiswa.<br>
    2. Melaksanakan berbagai macam aksi dan melakukan penyebaran isu secara merata yang kemudian mengagitasi massa untuk dapat bersama-sama konsisten menjadi proses gerakan mahasiswa.<br><br>
    Program Kerja :<br>
    1. LKMM- TM (Latihan Kepemimpinan Manajemen Mahasiswa Tingkat Menengah)<br><br>
    Agenda :<br>
    1. Kunjungan<br>
    2. Konsolidasi<br>
    3. Kumpul Update
  </div>
                </div>
              </div>




              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-6">
                    Kementerian Pemberdayaan Perempuan (PP)
                  </button>
                </h2>
                <div id="faq2-content-6" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                  <div class="card mt-4 card card-body">
    Kementerian yang bertugas untuk menyusun, merumuskan dan melakukan eskalasi gerakan terhadap isu-isu seputar perempuan.<br><br>
    Program Kerja :<br>
    1. Kartini Day Contest<br>
    2. Webinar Nasional Psikologi<br><br>
    Agenda :<br>
    1. Aksi Kreatif Hari IWD (International Woman Day)<br>
    2. Dialog Perempuan<br>
    3. Hari Kekerasan Seksual<br>
    4. Memperingati Hari Ibu<br>
  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>

    </section><!-- End F.A.Q Section -->


    

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
            <h4></h4>
            <ul>
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