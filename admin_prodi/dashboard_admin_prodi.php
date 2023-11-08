<?php
session_start();

// Cek apakah pengguna sudah login sebagai admin Prodi
if (!isset($_SESSION["id"]) || !isset($_SESSION["nama"]) || !isset($_SESSION["role"])) {
  echo '<script>alert("anda harus login sebagai dosen")</script>';
  echo '<script>window.location.href = "../login.php";</script>';
}

// Halaman Admin Prodi
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo-uns-biru.png" rel="icon">
  <link href="../assets/img/logo-uns-biru.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendoor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendoor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendoor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendoor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendoor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendoor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendoor/simple-datatables/dashboar.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo-uns-biru.png" alt="">
        <span class="d-none d-lg-block">E-CATALOG</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="hasil_pencarian.php">
        <input type="text" id="judul" name="judul" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      </li><!-- End Forms Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../logout.php">
          <i class="bi bi-person"></i>
          <span>Log-out</span>
        </a>
      </li>
      
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <?php
    if ($_SESSION["role"] == "admin prodi") {
      ?>
      <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar Poster</th>
                    <th scope="col">Nama File</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="gambar1.jpg" alt="Gambar Poster 1" class="img-thumbnail" style="max-width: 100px;"></td>
                    <td>File1.pdf</td>
                    <td>
                        <button class="btn btn-primary" onclick="acceptRequest(1)">Acc</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td><img src="gambar2.jpg" alt="Gambar Poster 2" class="img-thumbnail" style="max-width: 100px;"></td>
                    <td>File2.pdf</td>
                    <td>
                        <button class="btn btn-primary" onclick="acceptRequest(2)">Acc</button>
                    </td>
                </tr>
                <!-- Tambahkan baris berikut sesuai dengan data Anda -->
            </tbody>
        </table>
        <?php } ?>
      

    
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendoor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendoor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendoor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendoor/echarts/echarts.min.js"></script>
  <script src="../assets/vendoor/quill/quill.min.js"></script>
  <script src="../assets/vendoor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendoor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendoor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/dashboard.js"></script>

</body>

</html>