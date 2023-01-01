<?php
session_start();
if (!isset($_SESSION['id_user'])) {
  header("location:login.php");
}
include 'functions.php';
global $conn;
$id_user = $_SESSION['id_user'];
$mahasiswa = query("SELECT * FROM tb_pendaftar INNER JOIN 
  tb_jurusan ON tb_pendaftar.id_jurusan = tb_jurusan.id_jurusan
  INNER JOIN tb_prodi ON tb_pendaftar.id_prodi = tb_prodi.id_prodi 
  WHERE id_user = '$id_user' ");

   if (empty($mahasiswa)) {
       header("location:welcome_page.php");
   }

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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
  <link rel="stylesheet" type="text/css" href="css/profil.css">

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
          <li><a class="nav-link scrollto active" href="welcome_page.php #hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="welcome_page.php #about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="welcome_page.php #values">Visi & Misi</a></li>
          <li><a class="nav-link scrollto" href="welcome_page.php #faq">F.A.Q</a></li>
          <li><a class="nav-link scrollto" href="welcome_page.php #contact">Kontak</a></li>
          <li><a class="getstarted scrollto" href="register_mhs.php">Daftar</a></li>
          <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://rcmi.fiu.edu/wp-content/uploads/sites/30/2018/02/no_user.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="profil.php">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <div class="container emp-profile">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
  <?php foreach ($mahasiswa as $row): ?>
                        <div class="profile-img">
                            <img src="https://rcmi.fiu.edu/wp-content/uploads/sites/30/2018/02/no_user.png" alt=""/>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?=$row['nama'];?>
                                    </h5>
                                    <h6>
                                        Mahasiswa
                                    </h6>
                                    <p class="proile-rating">SKOR : <span><?=$row['skor'];?>/100</span></p>
                                    <p class="proile-rating">STATUS PENDAFTARAN : <?php
                                      if ($row['status']==="Verifikasi") {
                                        echo
                                        "<span class='btn btn-warning mx-2' style='color: white;'>Verifikasi</span>";
                                      }
                                      elseif ($row['status']==="Lolos") {
                                        echo
                                        "<span class='btn btn-success mx-2' style='color: white;'>Lolos</span>";
                                      }
                                      elseif ($row['status']==="Tidak Lolos") {
                                        echo
                                        "<span class='btn btn-warning mx-2' style='color: white;'>Tidak Lolos</span>";
                                      }


                                      ?>
                                      </p>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Biodata</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class ="btn btn-secondary profile-edit-btn" href="edit.php?id_mhs=<?= $row['id_mhs'];?>" style="color: white;">
                        Edit Profil
                    </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NPM</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $row['npm'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $row['nama'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $row['jenis_kelamin'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $row['tanggal_lahir'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Jurusan</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $row['jurusan'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Program Studi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $row['program_studi'];?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
  <?php endforeach;?>
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
        Designed by <a href="/">Kelompok 1</a>
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
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</body>

</html>