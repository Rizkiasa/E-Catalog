<?php
include '../config.php';

// Cek apakah parameter id diterima
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Ambil data file dari database berdasarkan ID
    $sql = "SELECT penulis, path_bab_1, path_bab_2, path_bab_3, path_bab_4, path_bab_5 FROM tugas_akhir WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        // Mendefinisikan header untuk memastikan bahwa file dianggap sebagai file unduhan
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $row["penulis"] . '_tugas_akhir.zip');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        // Membuka file dan mengirimkan kontennya ke output
        $zip = new ZipArchive();
        $zipFileName = tempnam(sys_get_temp_dir(), "tugas_akhir");

        if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
            // Tambahkan file ke dalam ZIP
            echo "File 1: ../" . $row["path_bab_1"];
            if (file_exists("../" . $row["path_bab_1"])) {
                echo "File exists";
                $zip->addFile('../' . $row["path_bab_1"], 'path_bab_1.docx');
            } else {
                echo "File not found";
            }

            echo "File 2: ../" . $row["path_bab_2"];
            if (file_exists("../" . $row["path_bab_2"])) {
                echo "File exists";
                $zip->addFile('../' . $row["path_bab_2"], 'path_bab_2.docx');
            } else {
                echo "File not found";
            }

            echo "File 3: ../" . $row["path_bab_3"];
            if (file_exists("../" . $row["path_bab_3"])) {
                echo "File exists";
                $zip->addFile('../' . $row["path_bab_3"], 'path_bab_3.docx');
            } else {
                echo "File not found";
            }

            echo "File 4: ../" . $row["path_bab_4"];
            if (file_exists("../" . $row["path_bab_4"])) {
                echo "File exists";
                $zip->addFile('../' . $row["path_bab_4"], 'path_bab_4.docx');
            } else {
                echo "File not found";
            }

            echo "File 5: ../" . $row["path_bab_5"];
            if (file_exists("../" . $row["path_bab_5"])) {
                echo "File exists";
                $zip->addFile('../' . $row["path_bab_5"], 'path_bab_5.docx');
            } else {
                echo "File not found";
            }

            // Mengirimkan file ZIP ke output
            readfile($zipFileName);

            // Menutup file ZIP
            $zip->close();

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
