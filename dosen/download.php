<?php
include '../config.php';

// Cek apakah parameter id diterima
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Ambil nama file dari database berdasarkan ID
    $sql = "SELECT nama, bab1, bab2, bab3, bab4, bab5 FROM tugas_akhir WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        // Mendefinisikan header untuk memastikan bahwa file dianggap sebagai file unduhan
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $row["nama"] . '_tugas_akhir.zip');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        // Membuka file dan mengirimkan kontennya ke output
        $zip = new ZipArchive();
        $zipFileName = tempnam(sys_get_temp_dir(), "tugas_akhir");
        if ($zip->open($zipFileName, ZipArchive::CREATE)) {
            $zip->addFromString('Bab1.txt', $row["bab1"]);
            $zip->addFromString('Bab2.txt', $row["bab2"]);
            $zip->addFromString('Bab3.txt', $row["bab3"]);
            $zip->addFromString('Bab4.txt', $row["bab4"]);
            $zip->addFromString('Bab5.txt', $row["bab5"]);
            $zip->close();

            // Mengirimkan file ZIP ke output
            readfile($zipFileName);

            // Menghapus file ZIP sementara setelah dikirim
            unlink($zipFileName);
        } else {
            echo "Gagal membuat file ZIP.";
        }

        exit();
    }
}
?>
