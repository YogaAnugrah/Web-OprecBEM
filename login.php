<?php
session_start();
require 'functions.php';
global $conn;

if (isset($_POST["login"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

 $result =  mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

if (mysqli_num_rows($result) === 1) {
  
  $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      $level = $row['level'];
          if ($level == 'Admin') {
      header("location:admin.php");
  } elseif ($level == 'Supervisor') {
      header("location:spv.php");
  }
  elseif ($level == 'Student') {
      header("location:welcome_page.php");
  }

  $_SESSION['id_user'] = $row['id_user'];
  $_SESSION['level'] = $row['level'];

      exit;
    } 
  }
   $error = true;

}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Open Recruitment | BEM POLINELA </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

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

    
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post" action="">
    <img class="mb-4" src="image/bemlogo.png" alt="" width="60" height="60">
    <h1 class="h3 mb-3 fw-normal">Login Form!</h1>
    <p><small>Login Akun Open Recruitment.</small></p>
    <?php 
    if (isset($error)):
      ?>
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Username/Password!</strong> salah silahkan cek kembali!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      <?php 
    endif;
      ?>
    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" autocomplete="off">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password"  name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <p class="mt-2">Belum punya akun? <a href="signup.php">Daftar</a></p>
    <p>Lupa Password <a href="ubahpw.php">Reset Password</a></p>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
  </form>
</main>


    
  </body>
</html>
