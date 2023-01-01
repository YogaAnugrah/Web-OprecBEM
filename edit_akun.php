<?php
require 'functions.php';
$id_user = $_GET["id_user"];
//query data berdasarkan id
$data = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");
$result = mysqli_fetch_array($data);

if (isset($_POST["submit"])) {
  if (updateuser($_POST)> 0) {
    
    echo "<script>
    alert('Edit data success!');
    document.location.href = 'data_akun.php';
    </script>";
  } 
  // else{
  //   echo "<script>
  //   alert('Edit data failed!');
  //   document.location.href = 'data_akun.php';
  //   </script>";
  
  // } 
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Aplikasi Open Recruitment | BEM POLINELA </title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

  <link rel="icon" type="image/png" href="image/bemlogo.png" />

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
      <h1 class="h3 mb-3 fw-normal">Form Ubah!</h1>
      <p><small>ini ubah.</small></p>
      <input type="hidden" name="id_user" class="form-control" id="floatingInput" placeholder="id_user" autocomplete="off" value="<?= $result['id_user']; ?>">

      <div class="form-floating">
        <input type="hidden" name="username" class="form-control" id="floatingInput" placeholder="username" autocomplete="off" value="<?= $result['username']; ?>">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="text" name="passwordlama" class="form-control" id="floatingInput" placeholder="passwordlama" autocomplete="off">
        <label for="floatingInput">Password Lama</label>
      </div>
      <div class="form-floating">
        <input type="text" name="passwordbaru" class="form-control" id="floatingInput" placeholder="passwordbaru" autocomplete="off">
        <label for="floatingInput">Password Baru</label>
      </div>
      <div class="form-floating">
      <input type="password"  name="passwordverif" class="form-control" id="floatingPassword" placeholder="Verifikasi Password">
      <label for="floatingPassword">Verifikasi Password</label>
    </div>
      <input type="hidden" name="level" value="<?= $result['level']; ?>">
      <br>
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Update</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>

    </form>

  </main>

</body>

</html>