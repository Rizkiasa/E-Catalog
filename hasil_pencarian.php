<?php
include 'config.php';
// Menerima kriteria pencarian dari formulir search.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
 
    $sql = "SELECT * FROM tugas_akhir WHERE judul LIKE '%$judul%' AND penulis LIKE '%$penulis%'";
    $result = mysqli_query($koneksi, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        // Tampilkan data TA, misalnya judul, dan lainnya
        echo "<p>Judul: " . $row["judul"] . "</p>";
        echo "<p>penulis: ". $row["penulis"] . "</p>";
        // ... tampilkan informasi lainnya sesuai kebutuhan
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian TA</title>
    <link rel="stylesheet" href="assets/css/hasil_pencarian.css">
</head>
<body>
    <div class="container">
        <h1>Hasil Pencarian Tugas Akhir</h1>
        <div class="search-results">
            <!-- Di sini Anda dapat menampilkan hasil pencarian -->
            <!-- Contoh: -->
            <!-- <p>Judul: Tugas Akhir 1</p>
                 <p>Penulis: John Doe</p> -->
            <!-- Tampilkan data TA yang sesuai dengan kriteria pencarian -->
        </div>
        <a href="dashboard.php">Kembali ke Pencarian</a>
    </div>
</body>
</html>
