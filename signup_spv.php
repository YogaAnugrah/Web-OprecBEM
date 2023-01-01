<?php
require 'functions.php';
if (isset($_POST["submit"])) {
  if (tambahuser($_POST)> 0) {
    
    echo "<script>
    alert('Insert data success!');
    document.location.href = 'signup_spv.php';
    </script>";
  } else{
    echo "<script>
    alert('Insert data failed!');
    document.location.href = 'signup_spv.php';
    </script>";
  
  } 
}
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

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                            <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

<main class="form-signin text-center">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
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
    </div><br>
    <div class="form-floating">
      <input type="password"  name="passwordverif" class="form-control" id="floatingPassword" placeholder="Verifikasi Password">
      <label for="floatingPassword">Verifikasi Password</label>
    </div>
    <input type="hidden" name="level" value="Supervisor">
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Submit</button>
    <a class = "w-100 btn btn-lg btn-danger mt-2" href="admin.php" style="text-decoration: none; color: white;"><p class="h5 mx-auto">Batal</p></a>
  </form>
        </div>
    </div>
  </div>
</main>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2022</span>
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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