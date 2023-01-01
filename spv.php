<?php
session_start();
if (!isset($_SESSION['id_user'])) {
  header("location:login.php");
}
if (isset($_SESSION['level'])) {
    $level = $_SESSION['level'];
    if ($level == 'Admin') {
header("location:admin.php");
}
elseif ($level == 'Student') {
header("location:welcome_page.php");
}
  } 

include 'functions.php';
global $conn;
$periode = query("SELECT * FROM periode"); 

$koneksi = new mysqli("localhost","root","","db_oprec");
$ekbis = $koneksi->query("select * from tb_pendaftar where id_jurusan='1'");
$jml_ekbis = $ekbis->num_rows;

$pangan = $koneksi->query("select * from tb_pendaftar where id_jurusan='2'");
$jml_pangan = $pangan->num_rows;

$tektan = $koneksi->query("select * from tb_pendaftar where id_jurusan='3'");
$jml_tektan = $tektan->num_rows;

$kebun = $koneksi->query("select * from tb_pendaftar where id_jurusan='4'");
$jml_kebun = $kebun->num_rows;

$ternak = $koneksi->query("select * from tb_pendaftar where id_jurusan='5'");
$jml_ternak = $ternak->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Presti BEM- Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <div class="sidebar-brand-text mx-4">PRESTI BEM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                            <a class="nav-link" href="spv.php">
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
                        <a class="collapse-item" href="read_spv.php">Data Pendaftar</a>
                        <a class="collapse-item" href="periode_spv.php">Data Periode</a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Presidium Inti</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-primary">Aplikasi Open Recruitment BEM</h1>
                    </div>
<!-- Begin Page Content -->
                <div class="container-fluid">

                <div>
    <canvas id="myChart"></canvas>
    </div>
    
    <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Ekonomi Dan Bisnis', 
                'Budidaya Tanaman Pangan', 
                'Teknologi Pertanian', 
                'Budidaya Tanaman Perkebunan',
                'Peternakakan'],
      datasets: [{
        label: 'DATA PENDAFTAR OPREC BEM POLINELA',
        backgroundColor: ['orange','blue','red','green','darkblue'],
        borderColor:'black',
        data: [<?php echo $jml_ekbis ?>,
               <?php echo $jml_pangan ?>,
               <?php echo $jml_tektan ?>,
               <?php echo $jml_kebun ?>,
               <?php echo $jml_ternak ?>],
        borderWidth: 3
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<!-- <p>PRODI</p> -->
<?php

// ekbis
$agb = $koneksi->query("select * from tb_pendaftar where id_prodi='33'");
$jml_agb = $agb->num_rows;

$akbd = $koneksi->query("select * from tb_pendaftar where id_prodi='34'");
$jml_akbd = $akbd->num_rows;

$mi = $koneksi->query("select * from tb_pendaftar where id_prodi='47'");
$jml_mi = $mi->num_rows;

$akp = $koneksi->query("select * from tb_pendaftar where id_prodi='48'");
$jml_akp = $akp->num_rows;

$agbp = $koneksi->query("select * from tb_pendaftar where id_prodi='49'");
$jml_agbp = $agbp->num_rows;

$pw = $koneksi->query("select * from tb_pendaftar where id_prodi='50'");
$jml_pw = $pw->num_rows;

$hotel = $koneksi->query("select * from tb_pendaftar where id_prodi='51'");
$jml_hotel = $hotel->num_rows;

$d2pjk = $koneksi->query("select * from tb_pendaftar where id_prodi='52'");
$jml_d2pjk = $d2pjk->num_rows;

// pangan

$ptp = $koneksi->query("select * from tb_pendaftar where id_prodi='55'");
$jml_ptp = $ptp->num_rows;

$horti = $koneksi->query("select * from tb_pendaftar where id_prodi='56'");
$jml_horti = $horti->num_rows;

$tekben = $koneksi->query("select * from tb_pendaftar where id_prodi='57'");
$jml_tekben = $tekben->num_rows;

$tpth = $koneksi->query("select * from tb_pendaftar where id_prodi='58'");
$jml_tpth = $tpth->num_rows;

// tektan
$tsl = $koneksi->query("select * from tb_pendaftar where id_prodi='59'");
$jml_tsl = $tsl->num_rows;

$mp = $koneksi->query("select * from tb_pendaftar where id_prodi='60'");
$jml_mp = $mp->num_rows;

$tepa = $koneksi->query("select * from tb_pendaftar where id_prodi='61'");
$jml_tepa = $tepa->num_rows;

$trki = $koneksi->query("select * from tb_pendaftar where id_prodi='62'");
$jml_trki = $trki->num_rows;

$trkjj = $koneksi->query("select * from tb_pendaftar where id_prodi='63'");
$jml_trkjj = $trkjj->num_rows;

$ppa = $koneksi->query("select * from tb_pendaftar where id_prodi='64'");
$jml_ppa = $ppa->num_rows;

$d2pasetri = $koneksi->query("select * from tb_pendaftar where id_prodi='65'");
$jml_d2pasetri = $d2pasetri->num_rows;

// kebun
$ptp = $koneksi->query("select * from tb_pendaftar where id_prodi='66'");
$jml_ptp = $ptp->num_rows;

$pmip = $koneksi->query("select * from tb_pendaftar where id_prodi='67'");
$jml_pmip = $pmip->num_rows;

$kopi = $koneksi->query("select * from tb_pendaftar where id_prodi='68'");
$jml_kopi = $kopi->num_rows;

// ternak
$proter = $koneksi->query("select * from tb_pendaftar where id_prodi='69'");
$jml_proter = $proter->num_rows;

$bdp = $koneksi->query("select * from tb_pendaftar where id_prodi='70'");
$jml_bdp = $bdp->num_rows;

$tekproter = $koneksi->query("select * from tb_pendaftar where id_prodi='71'");
$jml_tekproter = $tekproter->num_rows;

$tpi = $koneksi->query("select * from tb_pendaftar where id_prodi='72'");
$jml_tpi = $tpi->num_rows;

$tangkap = $koneksi->query("select * from tb_pendaftar where id_prodi='73'");
$jml_tangkap = $tangkap->num_rows;
?>
<br><br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                    <tr>
                        <th>No.</th>
                        <th>Pogram Studi</th>
                        <th>Banyak Pendaftar</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <td>1</td>
                    <td>D4 Pengelolaan Agribisnis</td>
                    <td><?php echo $jml_agb?></td>
                </tbody>
                <tbody align="center">
                    <td>2</td>
                    <td>D4 Akuntansi Bisnis Digital</td>
                    <td><?php echo $jml_akbd?></td>
                </tbody>
                <tbody align="center">
                    <td>3</td>
                    <td>D3 Manajemen Informatika</td>
                    <td><?php echo $jml_mi?></td>
                </tbody>
                <tbody align="center">
                    <td>4</td>
                    <td>D4 Akuntansi Perpajakan</td>
                    <td><?php echo $jml_akp?></td>
                </tbody>
                    <tbody align="center">
                    <td>5</td>
                    <td>D4 Agribisnis Pangan</td>
                    <td><?php echo $jml_agbp?></td>
                </tbody>
                <tbody align="center">
                    <td>6</td>
                    <td>D3 Perjalanan Wisata</td>
                    <td><?php echo $jml_pw?></td>
                </tbody>
                    <tbody align="center">
                    <td>7</td>
                    <td>D4 Pengelolaan Perhotelan</td>
                    <td><?php echo $jml_hotel?></td>
                </tbody>
                    <tbody align="center">
                    <td>8</td>
                    <td>D2 Administrasi Perpajakan</td>
                    <td><?php echo $jml_d2pjk?></td>
                </tbody>
                <tbody align="center">
                    <td>9</td>
                    <td>D3 Produksi Tanaman Pangan</td>
                    <td><?php echo $jml_ptp?></td>
                </tbody>
                <tbody align="center">
                    <td>10</td>
                    <td>D3 Hortikultura</td>
                    <td><?php echo $jml_horti?></td>
                </tbody>
                <tbody align="center">
                    <td>11</td>
                    <td>D4 Teknologi Perbenihan</td>
                    <td><?php echo $jml_tekben?></td>
                </tbody>
                <tbody align="center">
                    <td>12</td>
                    <td>D4 Teknologi Produksi Tanaman Hortikultura</td>
                    <td><?php echo $jml_tpth?></td>
                </tbody>
                <tbody align="center">
                    <td>13</td>
                    <td>D3 Teknik Sumberdaya Lahan Dan Lingkungan</td>
                    <td><?php echo $jml_tsl?></td>
                </tbody>
                <tbody align="center">
                    <td>14</td>
                    <td>D3 Mekanisasi Pertanian</td>
                    <td><?php echo $jml_mp?></td>
                </tbody>
                <tbody align="center">
                    <td>15</td>
                    <td>D3 Teknologi Pangan</td>
                    <td><?php echo $jml_tepa?></td>
                </tbody>
                <tbody align="center">
                    <td>16</td>
                    <td>D4 Teknologi Rekayasa Kimia Industri</td>
                    <td><?php echo $jml_trki?></td>
                </tbody>
                <tbody align="center">
                    <td>17</td>
                    <td>D4 Teknologi Rekayasa Kontruksi Jalan Dan Jembatan</td>
                    <td><?php echo $jml_trkjj?></td>
                </tbody>
                <tbody align="center">
                    <td>18</td>
                    <td>D4 Pengembangan Produk Agroindustri</td>
                    <td><?php echo $jml_ppa?></td>
                </tbody>
                <tbody align="center">
                    <td>19</td>
                    <td>D2 Pengelolaan Patiseri</td>
                    <td><?php echo $jml_d2pasetri?></td>
                </tbody>
                <tbody align="center">
                    <td>20</td>
                    <td>D3 Produksi Tanaman Perkebunan</td>
                    <td><?php echo $jml_ptp?></td>
                </tbody>
                <tbody align="center">
                    <td>21</td>
                    <td>D4 Produsi Dan Manajemen Industri Perkebunan</td>
                    <td><?php echo $jml_pmip?></td>
                </tbody>
                <tbody align="center">
                    <td>22</td>
                    <td>D4 Pengelolaan Perkebunan Kopi</td>
                    <td><?php echo $jml_kopi?></td>
                </tbody>
                <tbody align="center">
                    <td>23</td>
                    <td>D3 Produksi Ternak</td>
                    <td><?php echo $jml_proter?></td>
                </tbody>
                <tbody align="center">
                    <td>24</td>
                    <td>D3 Budidaya Perikanan</td>
                    <td><?php echo $jml_bdp?></td>
                </tbody>
                <tbody align="center">
                    <td>25</td>
                    <td>D4 Teknologi Produksi Ternak</td>
                    <td><?php echo $jml_tekproter?></td>
                </tbody>
                <tbody align="center">
                    <td>26</td>
                    <td>D4 Teknologi Pembenihan Ikan</td>
                    <td><?php echo $jml_tpi?></td>
                </tbody>
                <tbody align="center">
                    <td>27</td>
                    <td>D3 Perikanan Tangkap</td>
                    <td><?php echo $jml_tangkap?></td>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 d-flex flex-column justify-content-center mt-3">
                            <h2 data-aos="fade-up" class="text-dark">Periode Pendaftaran</h2><br>
                            <h5 align="justify" data-aos="fade-up" data-aos-delay="400" class="text-dark">
                                Daftar periode Open Recruitment BEM Politeknik Negeri Lampung
                            </h5>
                            <div data-aos="fade-up" data-aos-delay="600">
                                <div class="text-center text-lg-start">
                                </div>
                            </div>
                            </div>
                             <?php foreach ($periode as $row): ?>
                                <?php if($row['status']==="Aktif"):?>
                            <div class="card mt-2 w-100">
  <div class="card-header">
    Pendaftaran Anggota Staff BEM
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $row['periode'];?></h5>
    <ul>
        <li class="card-text">Nama Presiden: <?=$row['nama_presiden'];?></li>
        <li class="card-text">Nama Kabinet: <?=$row['nama_kabinet'];?></li>
        <li class="card-text">Tanggal Pendaftaran: <?=$row['tgl_pendaftaran'];?></li>
        <li class="card-text">Tanggal Seleksi: <?=$row['tgl_seleksi'];?></li>
        <li class="card-text">Tanggal Pengumuman: <?=$row['tgl_pengumuman'];?></li>
        <li class="card-text">Status: <?php
        if ($row['status'] === 'Aktif') {
            echo "<a class='btn btn-success btn-sm readonly' role='button'>Aktif</a>";
        } else{
            echo "<a class='btn btn-secondary btn-sm disabled' role='button' aria-disabled='true'>Selesai</a>";
        }
    ?></li>
    </ul>
  </div>
</div>
<?php endif;?>
 <?php endforeach; ?>
                        </div>
                        </div>
                        <div class="container">
                        <div class="row">
                        <div class="col-lg-6 d-flex flex-column justify-content-center mt-3">
                            <h2 data-aos="fade-up" class="text-dark">Riwayat Periode Pendaftaran</h2><br>
                            <h5 align="justify" data-aos="fade-up" data-aos-delay="400" class="text-dark">
                                Daftar riwayat periode Open Recruitment BEM Politeknik Negeri Lampung
                            </h5>
                            <div data-aos="fade-up" data-aos-delay="600">
                                <div class="text-center text-lg-start">
                                </div>
                            </div>
                            </div>
                             <?php foreach ($periode as $row): ?>
                                <?php if($row['status']==="Selesai"):?>
                            <div class="card mt-2 w-100">
  <div class="card-header">
    Pendaftaran Anggota Staff BEM
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $row['periode'];?></h5>
    <ul>
        <li class="card-text">Nama Presiden: <?=$row['nama_presiden'];?></li>
        <li class="card-text">Nama Kabinet: <?=$row['nama_kabinet'];?></li>
        <li class="card-text">Tanggal Pendaftaran: <?=$row['tgl_pendaftaran'];?></li>
        <li class="card-text">Tanggal Seleksi: <?=$row['tgl_seleksi'];?></li>
        <li class="card-text">Tanggal Pengumuman: <?=$row['tgl_pengumuman'];?></li>
        <li class="card-text">Status: <?php
        if ($row['status'] === 'Aktif') {
            echo "<a class='btn btn-success btn-sm readonly' role='button'>Aktif</a>";
        } else{
            echo "<a class='btn btn-secondary btn-sm disabled' role='button' aria-disabled='true'>Selesai</a>";
        }
    ?></li>
    </ul>
  </div>
</div>
<?php endif;?>
 <?php endforeach; ?>
</div>
</div>



                    

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kelompok 1</span>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
