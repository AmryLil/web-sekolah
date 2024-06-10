<?php
include "../../../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Handling upload foto
    $foto = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];
    $folder = "foto/".$foto;
    
    move_uploaded_file($temp, $folder);

    // Buat dan jalankan perintah SQL untuk update data murid
    $sql = "UPDATE murid SET nama=?, kelas=?,jurusan=?, whatsapp=?, email=?, password=?, foto=? WHERE id=?";
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("sssssssi", $nama, $kelas,$jurusan, $whatsapp, $email, $password, $foto, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Data murid berhasil diupdate!";
            header("Location: ../index.php");
        } else {
            
            echo  "id= $id ";
            echo "Tidak ada perubahan dalam data murid.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
