<?php
// Lakukan koneksi ke database
include "../../../koneksi.php";

// Periksa apakah data dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir tambah data
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Contoh untuk mengunggah foto
    $nama_file = $_FILES['photo']['name'];
    $ukuran_file = $_FILES['photo']['size'];
    $tmp_file = $_FILES['photo']['tmp_name'];
    $direktori = "foto/$nama_file";

    // Lakukan pengecekan file gambar sebelum diunggah ke direktori
    if (move_uploaded_file($tmp_file, $direktori)) {
        // Query SQL untuk menambahkan data murid ke dalam tabel
        $sql = "INSERT INTO murid (nama, kelas,jurusan, whatsapp, email, password, foto) VALUES ('$nama', '$kelas','$jurusan', '$whatsapp', '$email', '$password', '$nama_file')";
        
        // Lakukan query ke database
        if ($conn->query($sql) === TRUE) {
            echo "Data murid berhasil ditambahkan";
            header("Location: ../index.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan dalam mengunggah foto.";
    }

    // Tutup koneksi ke database
    $conn->close();
}
?>
