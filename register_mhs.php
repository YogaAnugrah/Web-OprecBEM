<?php
session_start();
if (!isset($_SESSION['id_user'])) {
  header("location:login.php");
}
include 'functions.php';
global $conn;

if (isset($_POST["submit"])) {
  if (tambahmhs($_POST)> 0) {
    
    echo "<script>
    alert('Insert data success!');
    document.location.href = 'welcome_page.php';
    </script>";
  } else{
    echo "<script>
    alert('Insert data failed!');
    document.location.href = 'register_mhs.php';
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
    <form method="post" action="" enctype="multipart/form-data">
      <img class="mb-4" src="image/bemlogo.png" alt="" width="60" height="60">
      <h1 class="h3 mb-3 fw-normal">Form Pendaftaran!</h1>
      <p><small>Formulir Pendaftaran BEM Polinela.</small></p>

   <div class="form-floating">
        <select id="periode" name="id_periode" class="form-select" aria-label="Floating label select example">
          <?php
                                    global $conn; 
                                    $query="SELECT * FROM periode WHERE status ='Aktif' ";
                                     $result = mysqli_query($conn,$query);
                                          while ($data=mysqli_fetch_array($result)) {
                                                                                    ?>

          <option value="<?=$data['id_periode']?>"><?=$data['periode']?></option>
          <?php } ?>
        </select>
        <label for="periode">Periode Pendaftaran</label>
      </div>
      <div class="form-floating">
        <input type="text" name="npm" class="form-control" id="floatingInput" placeholder="npm" autocomplete="off">
        <label for="floatingInput">NPM</label>
      </div>
      <div class="form-floating">
        <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="nama" autocomplete="off">
        <label for="floatingInput">Nama Lengkap</label>
      </div>
      <div class="form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jenis_kelamin">
          <option selected disabled>--Pilih Jenis Kelamin--</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
        <label for="floatingSelect">Jenis Kelamin</label>
      </div>
      <div class="form-floating">
        <input type="date" name="tanggal_lahir" class="form-control" id="floatingInput" placeholder="Tanggal Lahir" autocomplete="off">
        <label for="floatingInput">Tanggal Lahir</label>
      </div>
      <div class="form-floating">
        <select id="jurusan" name="jurusan" class="form-select" aria-label="Floating label select example">
          <option selected disabled>--Pilih Jurusan--</option>
          <?php
                                    global $conn; 
                                    $query="SELECT * FROM tb_jurusan";
                                     $result = mysqli_query($conn,$query);
                                          while ($data=mysqli_fetch_array($result)) {
                                                                                    ?>

          <option value="<?=$data['id_jurusan']?>"><?=$data['jurusan']?></option>
          <?php } ?>
        </select>
        <label for="jurusan">Jurusan</label>
      </div>

      <div class="form-floating">
        <select id="prodi" name="prodi" class="form-select" aria-label="Floating label select example">
          <option disabled selected>--Pilih Program Studi--</option>
          <?php
                                    global $conn; 
                                    $query="SELECT * FROM tb_prodi";
                                     $result = mysqli_query($conn,$query);
                                          while ($data=mysqli_fetch_array($result)) {
                                                                                    ?>

          <option value="<?=$data['id_prodi']?>"><?=$data['program_studi']?></option>
          <?php } ?>
        </select>
        <label for="prodi">Program Studi</label>
      </div>

      </div>

      <div class="mb-3">
        <label for="formFile" class="form-label">Upload Berkas</label>
        <input class="form-control" type="file" name="berkas" id="formFile">
        <p><small>(*Format file harus PDF)</small></p>
      </div>
      <input type="hidden" name="skor" value="0">
      <input type="hidden" name="status" value="Verifikasi">
      <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'];?>">
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign Up</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>

    </form>

  </main>

</body>

</html>