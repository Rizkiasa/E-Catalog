<?php
include '../config.php';
 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM tugas_akhir WHERE id = $id");
    
    // Perbaikan: Ambil data dengan mysqli_fetch_assoc
    $row = mysqli_fetch_assoc($data);
    
    if ($row) {
        // Lokasi file yang akan diunduh
        $file_path = '../' . $row['path_bebas_lab'];
       
        if (file_exists($file_path)) {
            // Mengatur header untuk mengindikasikan jenis konten dan attachment
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file_path));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));
            
            // Membaca file dan mengirimkannya ke output
            readfile($file_path);
            exit;
        } else {
            echo 'File not found.';
        }
    } else {
        echo 'Data not found.';
    }
} else {
    echo 'Invalid request.';
}
?>
