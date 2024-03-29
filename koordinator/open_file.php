<?php
include '../config.php';

// Cek apakah parameter id diterima
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Ambil nama file dari database berdasarkan ID
    $sql = "SELECT penulis, path_pengesahan, path_ketersediaan FROM tugas_akhir WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        // Mendefinisikan header untuk memastikan bahwa file dianggap sebagai file unduhan
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $row["penulis"] . '_dokumen_pelengkap.zip');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        // Membuka file dan mengirimkan kontennya ke output
        $zip = new ZipArchive();
        $zipFileName = tempnam(sys_get_temp_dir(), "tugas_akhir");
        if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($row["path_pengesahan"], '.doc,.docx,.pdf'); 
            $zip->addFile($row["path_ketersediaan_publikasi"], '.doc,.docx,.pdf'); 
            $zip->close();

            // Debugging: Output content of variables
            var_dump($row["path_pengesahan"], $row["path_ketersediaan_publikasi"]);

            // Mengirimkan file ZIP ke output
            readfile($zipFileName);

            // Menghapus file ZIP sementara setelah dikirim
            unlink($zipFileName);
        } else {
            echo "Gagal membuat file ZIP.";
        }

        exit();
    } else {
        echo "Data tidak ditemukan untuk ID: $id";
    }
} else {
    echo "ID tidak diterima.";
}
?>
