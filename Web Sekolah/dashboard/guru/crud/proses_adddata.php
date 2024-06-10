<?php
// Lakukan koneksi ke database
include "../../../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama_file = $_FILES['photo']['name'];
    $ukuran_file = $_FILES['photo']['size'];
    $tmp_file = $_FILES['photo']['tmp_name'];
    $direktori = "../../../../foto/upload/$nama_file";
    if (move_uploaded_file($tmp_file, $direktori)) {
        $sql = "INSERT INTO guru (nama, jabatan, wa, email, password, foto) VALUES ('$nama', '$jabatan', '$whatsapp', '$email', '$password', '$nama_file')";
        if ($conn->query($sql) === TRUE) {
            echo "Data guru berhasil ditambahkan";
            header("Location: ../index.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan dalam mengunggah foto.";
    }
    $conn->close();
}
?>
