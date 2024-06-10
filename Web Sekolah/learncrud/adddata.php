<?php
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    var_dump($_FILES);
    $jurusan = $_POST['jurusan'] ?? '';
    $kelas = $_POST['kelas'] ?? '';
    $mata_pelajaran = $_POST['mata_pelajaran'] ?? '';
    $judul = $_POST['judul'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    
    // Menggunakan pengecekan apakah data yang diperlukan tidak kosong
    if (!empty($jurusan) && !empty($kelas) && !empty($mata_pelajaran) && !empty($judul) && !empty($deskripsi) && isset($_FILES['file_materi'])) {
        $nama_file = $_FILES['file_materi']['name'];
        $ukuran_file = $_FILES['file_materi']['size'];
        $tmp_file = $_FILES['file_materi']['tmp_name'];
        $direktori = "upload/$nama_file";
        
        // Memindahkan file yang diunggah ke direktori tujuan
        if (move_uploaded_file($tmp_file, $direktori)) {
            $sql = "INSERT INTO tugas_materi (jurusan, kelas, mata_pelajaran, judul, path_file, deskripsi)
            VALUES ('$jurusan', '$kelas', '$mata_pelajaran', '$judul', '$nama_file', '$deskripsi')";
            
            // Menjalankan query SQL untuk menyimpan data ke dalam database
            if ($conn->query($sql) === TRUE) {
                echo "Data berhasil ditambahkan";
                // Redirect ke halaman tertentu setelah berhasil menambahkan data
                header("Location: ../crudlearn.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo "Data yang diperlukan tidak lengkap.";
    }
} else {
    echo "Metode permintaan tidak valid.";
}

$conn->close();
?>
