<?php
session_start();

include "./koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    if ($status === 'admin') {
        // Pengecekan apakah login sebagai admin
        $sql = "SELECT * FROM admin WHERE gmail = '$email' AND password = '$password'";
        $result_admin = $conn->query($sql);

        if ($result_admin->num_rows > 0) {
            // Login sebagai admin berhasil
            $row = $result_admin->fetch_assoc();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['status'] = 'admin';
            $_SESSION['nama'] = $row['nama'];

            header("location: home.php");
        } else {
            echo "Login gagal. Silakan cek email dan password Anda.";
        }
    } elseif ($status === 'siswa') {
        $sql = "SELECT * FROM murid WHERE email = '$email' AND password = '$password'";
        $result_siswa = $conn->query($sql);

        if ($result_siswa->num_rows > 0) {
            $row = $result_siswa->fetch_assoc();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['status'] = 'siswa';
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['jurusan'] = $row['jurusan'];
            $_SESSION['kelas'] = $row['kelas'];

            header("location: home.php");
        } else {
            echo "Login gagal. Silakan cek email dan password Anda.";
        }
    } elseif ($status === 'guru') {
        $sql = "SELECT * FROM guru WHERE email = '$email' AND password = '$password'";
        $result_guru = $conn->query($sql);

        if ($result_guru->num_rows > 0) {
            $row = $result_guru->fetch_assoc();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['status'] = 'guru';
            $_SESSION['nama'] = $row['nama'];
            header("location: home.php");
        } else {
            echo "Login gagal. Silakan cek email dan password Anda.";
        }
    }
}

$conn->close();
?>
