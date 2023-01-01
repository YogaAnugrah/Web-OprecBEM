<?php
include 'functions.php';
global $conn;
$id_mhs = $_GET['id_mhs'];
$mahasiswa = query("SELECT * FROM tb_pendaftar INNER JOIN 
  tb_jurusan ON tb_pendaftar.id_jurusan = tb_jurusan.id_jurusan
  INNER JOIN tb_prodi ON tb_pendaftar.id_prodi = tb_prodi.id_prodi 
  WHERE id_mhs = '$id_mhs' ");  

if (isset($_POST["submit"])) {
  if (penilaianMhs($_POST)> 0) {
    
    echo "<script>
    alert('Edit data success!');
    document.location.href = 'read_pendaftar.php';
    </script>";
  } else{
    echo "<script>
    alert('Edit data failed!');
    </script>";
  
  } 
}
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Detail Pendaftar</title>
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
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                        <!-- Sidebar - Brand -->
                        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                            <div class="sidebar-brand-icon">
                                <img class="bi me-2" width="30" height="30" role="img" aria-label="Bootstrap" src="img/bemlogo.png">
                            </div>
                            <div class="sidebar-brand-text mx-4">ADMIN BEM</div>
                        </a>
            
                        <!-- Divider -->
                        <hr class="sidebar-divider my-0">
            
                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item active">
                            <a class="nav-link" href="admin.php">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span></a>
                        </li>
            
                        <!-- Heading -->
                        <div class="sidebar-heading">
                            Action
                        </div>
            
                        <!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                                aria-expanded="true" aria-controls="collapsePages">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Pendaftaran</span>
                            </a>
                            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Opsi:</h6>
                                    <a class="collapse-item" href="signup_spv.php">Buat akun Presti</a>
                                    <a class="collapse-item" href="read_pendaftar.php">Data Pendaftar</a>
                                    <a class="collapse-item" href="read_akun.php">Data Akun</a>
                                    <a class="collapse-item" href="periode.php">Data Periode</a>
                                </div>
                            </div>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider d-none d-md-block">
            
                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>
            
                    </ul>
                    <!-- End of Sidebar -->
            
                    <!-- Content Wrapper -->
                    <div id="content-wrapper" class="d-flex flex-column">
            
                        <!-- Main Content -->
                        <div id="content">
                            <!-- Topbar -->
                            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            
                                <!-- Sidebar Toggle (Topbar) -->
                                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                    <i class="fa fa-bars"></i>
                                </button>
            
                                <!-- Topbar Navbar -->
                                <ul class="navbar-nav ml-auto">
            
            
                                    <!-- Nav Item - User Information -->
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                            <img class="img-profile rounded-circle"
                                                src="img/undraw_profile.svg">
                                        </a>
                                        
                                        <!-- Dropdown - User Information -->
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="logout.php">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Logout
                                            </a>
                                        </div>
                                    </li>
            
                                </ul>
            
                            </nav>
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
                                    <div class="col-auto">
    <label for="inputSkor" class="col-form-label">NILAI</label>
  </div>
  <input type="hidden" name="id_mhs" value="<?=$row['id_mhs'];?>">
  <div class="col-auto">
    <input type="number" id="inputSkor" class="form-control" name="skor" aria-describedby="btn-submit" value="<?= $row['skor'];?>" max =100 min = 0>
  </div>
   <div class="col-auto">
     <label for="inputStatus" class="col-form-label">STATUS</label>
        <select name="status" id="inputStatus" class="form-control">
          <option value="Verifikasi" <?php if($row['status'] == "Verifikasi") { echo 'selected'; } ?>>Verifikasi</option>
          <option value="Lolos" <?php if($row['status'] == "Lolos") { echo 'selected'; } ?>>Lolos</option>
          <option value="Tidak Lolos" <?php if($row['status'] == "Tidak Lolos") { echo 'selected'; } ?>>Tidak Lolos</option>
        </select>
  </div>
   <div class="col-auto">
    <span id="btn-submit" class="form-text">
     <button class="btn btn-sm btn-primary mt-3 mb-3" type="submit" name="submit">Submit</button>
    </span>
  </div>
                                   
                                    

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Biodata</a>
                                </li>
                            </ul>
                        </div>
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
                                          <div class="row">
                                            <div class="col-md-6">
                                                <label>Berkas Pendaftaran</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $row['berkas'];?></p>
                                                <a class="btn btn-sm btn-secondary" href="unduhfile.php?file=<?=$row['berkas']?>">Unduh Berkas Pendaftaran</a>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
    </div>
  <?php endforeach;?>
</div>
</div>
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
      <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>