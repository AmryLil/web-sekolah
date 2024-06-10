<?php
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $jurusan = $_POST['jurusan'];
    $kelas = $_POST['kelas'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    if ($_FILES['file_materi']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file_materi"]["name"]);

        if (move_uploaded_file($_FILES["file_materi"]["tmp_name"], $target_file)) {
            $path_file = $target_file; // Mengatur path_file untuk menyimpan dalam database
        } else {
            echo "Gagal mengunggah file.";
            $path_file = ''; // Jika gagal diunggah, path_file tetap kosong
        }
    } else {
        $path_file = ''; // Sesuaikan dengan path file lama yang tersimpan di database
    }

    if (!empty($path_file)) {
        $sql = "UPDATE tugas_materi SET 
                    jurusan = '$jurusan',
                    kelas = '$kelas',
                    mata_pelajaran = '$mata_pelajaran',
                    judul = '$judul',
                    deskripsi = '$deskripsi',
                    path_file = '$path_file'
                WHERE id = $id";
    } else {
        $sql = "UPDATE tugas_materi SET 
                    jurusan = '$jurusan',
                    kelas = '$kelas',
                    mata_pelajaran = '$mata_pelajaran',
                    judul = '$judul',
                    deskripsi = '$deskripsi'
                WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate";
        header("Location: ../crudlearn.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Tutup koneksi database
    $conn->close();
}
?>
