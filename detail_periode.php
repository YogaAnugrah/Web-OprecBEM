<?php
session_start();
if (!isset($_SESSION['id_user'])) {
  header("location:login.php");
}
require 'functions.php';
global $conn;
$id_periode = $_GET['id_periode'];
$mahasiswa = query("SELECT * FROM tb_pendaftar INNER JOIN 
  tb_jurusan ON tb_pendaftar.id_jurusan = tb_jurusan.id_jurusan
  INNER JOIN tb_prodi ON tb_pendaftar.id_prodi = tb_prodi.id_prodi INNER JOIN periode
  ON tb_pendaftar.id_periode = periode.id_periode WHERE id_periode= '$id_periode'"); 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin BEM - Pendaftar</title>
    <!-- CSS only -->

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
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
                                <span>Akun dan Pendaftar</span>
                            </a>
                            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Opsi:</h6>
                                    <a class="collapse-item" href="signup_spv.php">Buat akun Presti</a>
                                    <a class="collapse-item" href="read_pendaftar.php">Data Pendaftar</a>
                                    <a class="collapse-item" href="read_akun.php">Data Akun</a>
                                </div>
                            </div>
                        </li>
            
                      
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Jurusan dan Prodi</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opsi:</h6>
                        <a class="collapse-item" href="jurusan_admin.php">Jurusan</a>
                        <a class="collapse-item" href="prodi_admin.php">Program Studi</a>
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
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                            aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Profile
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Logout
                                            </a>
                                        </div>
                                    </li>
            
                                </ul>
            
                            </nav>
                            <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pendaftar Oprec BEM</h1>
                    <p class="mb-4">Berikut adalah Data Pendaftar OPREC BEM KBM POLINELA</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="auto" cellspacing="0">
                                    <thead align="center">
                                        <tr>
                                            <th>No.</th>
      <th>NPM</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Tanggal Lahir</th>
      <th>Jurusan</th>
      <th>Program Studi</th>
      <th>Periode</th>
      <th>Status</th>
      <th>Aksi</th>

    </tr>
                                    </thead>
                                    <tbody align="center">
    <?php $i = 1;?>
    <?php foreach ($mahasiswa as $row): ?>
   <tr>
     <td><?= $i;?></td>
     <td><?= $row['npm'];?></td>
     <td><?= $row['nama'];?></td>
     <td><?= $row['jenis_kelamin'];?></td>
     <td><?= $row['tanggal_lahir'];?></td>
     <td><?= $row['jurusan'];?></td>
     <td><?= $row['program_studi'];?></td>
     <td><?= $row['periode'];?></td>
     <td><?= $row['status'];?></td>
     <td>
        <div class="d-inline p-2">
        <a href="detail_pendaftar.php?id_mhs=<?= $row['id_mhs']; ?>"><button class="btn btn-success">Detail</button></a>
        <a href="hapus.php?id_mhs=<?= $row['id_mhs']; ?>"
        onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')"><button class="btn btn-danger">Hapus</button></a>
    </div>
    </td>

   </tr>
   <?php $i++;?>
 <?php endforeach; ?>
  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="welcome_page.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
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