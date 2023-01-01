<?php
require 'functions.php';
if (isset($_POST["submit"])) {
  if (tambahuser($_POST)> 0) {
    
    echo "<script>
    alert('Insert data success!');
    document.location.href = 'login.php';
    </script>";
  } else{
    echo "<script>
    alert('Insert data failed!');
    document.location.href = 'signup.php';
    </script>";
  
  } 
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Open Recruitment | BEM POLINELA </title>

    <meta content="" name="description">

  <meta content="" name="keywords">

     <!-- Favicons -->
  <link rel="icon" type="image/png" href="img/bemlogo.png" />

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
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
   <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/bemlogo.png" alt="">
        <span>Oprec</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="index.php #values">Visi & Misi</a></li>
          <li><a class="nav-link scrollto" href="index.php #faq">F.A.Q</a></li>
          <li><a class="nav-link scrollto" href="index.php #contact">Kontak</a></li>
          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">

        <div class="d-flex flex-column justify-content-center">    
<main class="form-signin mt-5">
  <form method="post" action="">
    
    <h1 class="h3 mb-3 fw-normal">Sign Up!</h1>
    <p><small>Daftar akun Open Recruitment.</small></p>

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" autocomplete="off">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password"  name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
      <input type="password"  name="passwordverif" class="form-control" id="floatingPassword" placeholder="Verifikasi Password">
      <label for="floatingPassword">Verifikasi Password</label>
    </div>
  <input type="hidden" name="level" value="Student">
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign Up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
  </form>
</main>
</div>
</div>
</div>

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
