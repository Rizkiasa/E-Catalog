<?php
// Ambil informasi profil pengguna dari database (sesuai dengan kebutuhan Anda)
$nama = "John Doe";
$email = "johndoe@example.com";
$nim = "123456789";
$jurusan = "Teknik Informatika";

// Tentukan lokasi foto profil pengguna
$fotoProfilPath = "uploads/profile_picture.jpg"; // Sesuaikan dengan lokasi penyimpanan foto profil

// Halaman Profil
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
  <link href="assets/img/logo-uns-biru.png" rel="icon">
  <link href="assets/img/logo-uns-biru.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendoor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendoor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendoor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendoor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendoor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendoor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendoor/simple-datatables/dashboar.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/dashboard.css" rel="stylesheet">
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
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="upload.php">
          <i class="bi bi-journal-text"></i><span>Upload</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

<div class="pagetitle">
  <h1>Profile</h1>
  <div class="pagetitle">
       <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
        <div class="container">
        <div class="profile-info">
            <!-- Tampilkan informasi profil pengguna -->
            <div class="profile-image">
                <img src="<?php echo $fotoProfilPath; ?>" alt="Foto Profil">
            </div>
            <p><strong>Nama:</strong> <?php echo $nama; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>NIM:</strong> <?php echo $nim; ?></p>
            <p><strong>Jurusan:</strong> <?php echo $jurusan; ?></p>
        </div>
    </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">
          <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
          </ul>
              <div class="tab-content pt-2">
              <div class="tab-pane fade show active profile-edit" id="profile-edit">
              <div class="container">
              <div class="edit-profile-form">

<form action="update_profile.php" method="POST" enctype="multipart/form-data">
    <div class="input-container">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="" required>
    </div>
    <div class="input-container">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="" required>
    </div>
    <div class="input-container">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="" required>
    </div>
    <div class="input-container">
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="" required>
    </div>
    <div class="input-container">
        <label for="foto_profil">Foto Profil :</label>
        <input type="file" id="foto_profil" name="foto_profil" accept="image/jpeg, image/jpg, image/png">
    </div>
    <button type="submit">Simpan Perubahan</button>
</form>
</section>

</main><!-- End #main -->

        
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendoor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendoor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendoor/chart.js/chart.umd.js"></script>
  <script src="assets/vendoor/echarts/echarts.min.js"></script>
  <script src="assets/vendoor/quill/quill.min.js"></script>
  <script src="assets/vendoor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendoor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendoor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/dashboard.js"></script>

</body>

</html>