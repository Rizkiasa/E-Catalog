<?php
session_start();

if (isset($_POST["nama"]) && isset($_POST["email"]) && isset($_POST["nim"]) && isset($_POST["jurusan"])) {
    // Tangkap data dari formulir
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $nim = $_POST["nim"];
    $jurusan = $_POST["jurusan"];

    // Proses unggahan gambar profil
    if ($_FILES["foto_profil"]["error"] == 0) {
        $fotoProfilName = "profile_picture.jpg"; // Nama file foto profil
        $fotoProfilPath = "uploads/" . $fotoProfilName;
        move_uploaded_file($_FILES["foto_profil"]["tmp_name"], $fotoProfilPath);
    }

    // Simpan informasi profil ke database (jika diperlukan)

    // Redirect kembali ke halaman profil
    header("location: profile.php");
} else {
    echo "Terjadi kesalahan dalam pemrosesan data.";
}
