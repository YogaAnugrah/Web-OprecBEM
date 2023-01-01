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
    
<main class="form-signin">
  <form method="post" action="">
    <img class="mb-4" src="image/bemlogo.png" alt="" width="60" height="60">
    <h1 class="h3 mb-3 fw-normal">Sign Up!</h1>
    <p><small>Daftar akun Presidium Inti.</small></p>

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
  <input type="hidden" name="level" value="Supervisor">
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Submit</button>
    <a class = "w-100 btn btn-lg btn-danger mt-2" href="admin.php" style="text-decoration: none; color: white;"><p class="h5 mx-auto">Batal</p></a>
    <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
  </form>
</main>


    
  </body>
</html>