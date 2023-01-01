<?php
session_start();
if (!isset($_SESSION['id_user'])) {
  header("location:login.php");
}
include 'functions.php';
global $conn;
$id_mhs = $_GET['id_mhs'];
$mhs = query("SELECT * FROM tb_pendaftar INNER JOIN 
  tb_jurusan ON tb_pendaftar.id_jurusan = tb_jurusan.id_jurusan
  INNER JOIN tb_prodi ON tb_pendaftar.id_prodi = tb_prodi.id_prodi 
  WHERE id_mhs = $id_mhs")[0];

if (isset($_POST["submit"])) {
  if (editMahasiswa($_POST)> 0) {
    
    echo "<script>
    alert('Edit data success!');
    document.location.href = 'welcome_page.php';
    </script>";
  } else{
    echo "<script>
    alert('Edit data failed!');
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
    <link href="css/signin.css" rel="stylesheet">

    

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
    <form method="post" action="" enctype="multipart/form-data">
      <input type="hidden" name="id_mhs" value="<?=$mhs['id_mhs'];?>">
      <img class="mb-4" src="image/bemlogo.png" alt="" width="60" height="60">
      <h1 class="h3 mb-3 fw-normal">Edit Profil Pendaftaran.</h1>
      <p><small>Data Pendaftaran BEM Polinela.</small></p>
        
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
      
        <input type="hidden" name="id_mhs" class="form-control" id="floatingInput" placeholder="npm" autocomplete="off" value="<?= $mhs['id_mhs']; ?>">
        
  

      <div class="form-floating">
        <input type="text" name="npm" class="form-control" id="floatingInput" placeholder="npm" autocomplete="off" value="<?= $mhs['npm']; ?>">
        <label for="floatingInput">NPM</label>
      </div>
      <div class="form-floating">
        <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="nama" autocomplete="off" value="<?= $mhs['nama']; ?>">
        <label for="floatingInput">Nama Lengkap</label>
      </div>

      <div class="form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jenis_kelamin">
          <option value="Laki-laki" <?php if($mhs['jenis_kelamin'] == "Laki-laki") { echo 'selected'; } ?>>Laki-laki</option>
          <option value="Perempuan" <?php if($mhs['jenis_kelamin'] == "Perempuan") { echo 'selected'; } ?>>Perempuan</option>
        </select>
        <label for="floatingSelect">Jenis Kelamin</label>
      </div>

      <div class="form-floating">
        <input type="date" name="tanggal_lahir" class="form-control" id="floatingInput" placeholder="Tanggal Lahir" autocomplete="off" value="<?= $mhs['tanggal_lahir']; ?>">
        <label for="floatingInput">Tanggal Lahir</label>
      </div>
<div class="form-floating">
        <select id="jurusan" name="id_jurusan" class="form-select" aria-label="Floating label select example">    
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
        <select id="prodi" name="id_prodi" class="form-select" aria-label="Floating label select example">    
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
      <br>
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Update</button>
      <a class = "w-100 btn btn-lg btn-danger mt-2" href="profil.php?<?=$_SESSION['id_user'];?>" style="text-decoration: none; color: white;"><p class="h5 mx-auto">Batal</p></a>
      <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>

    </form>

  </main>

</body>

</html>