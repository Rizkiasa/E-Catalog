<?php
session_start();

// Cek apakah pengguna sudah login, jika belum, alihkan ke halaman login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Pastikan direktori penyimpanan file yang sesuai sudah ada dan dapat diakses
$uploadDirectory = "uploads/";

if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// Tangkap data dari formulir upload
$judul = $_POST["judul"];
$abstrak = $_POST["abstrak"];
$githubLink = $_POST["github_link"];

// Tangkap dan periksa file-file yang diunggah
if ($_FILES["pengesahan"]["error"] == 0 &&
    $_FILES["bebas_lab"]["error"] == 0 &&
    $_FILES["kesediaan_publikasi"]["error"] == 0 &&
    $_FILES["poster_ta"]["error"] == 0) {
    
    // File lembar pengesahan (PDF)
    $pengesahanFileName = $uploadDirectory . basename($_FILES["pengesahan"]["name"]);
    if (move_uploaded_file($_FILES["pengesahan"]["tmp_name"], $pengesahanFileName)) {
        // File berhasil diunggah
        // Simpan informasi di database (jika diperlukan)
    }

    // File lembar bebas lab
    $bebasLabFileName = $uploadDirectory . basename($_FILES["bebas_lab"]["name"]);
    if (move_uploaded_file($_FILES["bebas_lab"]["tmp_name"], $bebasLabFileName)) {
        // File berhasil diunggah
    }

    // File lembar kesediaan publikasi
    $kesediaanPublikasiFileName = $uploadDirectory . basename($_FILES["kesediaan_publikasi"]["name"]);
    if (move_uploaded_file($_FILES["kesediaan_publikasi"]["tmp_name"], $kesediaanPublikasiFileName)) {
        // File berhasil diunggah
    }

    // File poster TA (gambar)
    $posterFileName = $uploadDirectory . basename($_FILES["poster_ta"]["name"]);
    if (move_uploaded_file($_FILES["poster_ta"]["tmp_name"], $posterFileName)) {
        // File berhasil diunggah
    }

    // Informasi sukses
    echo "Tugas Akhir berhasil diunggah!";
} else {
    // Ada kesalahan dalam unggah file
    echo "Terjadi kesalahan dalam unggah file.";
}
?>
