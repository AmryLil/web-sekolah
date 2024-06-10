<?php
include "../../../koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $foto = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];
    $folder = "../../../../foto/upload/".$foto;
    move_uploaded_file($temp, $folder);
    $sql = "UPDATE guru SET nama=?, jabatan=?, wa=?, email=?, password=?, foto=? WHERE id_guru=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssssi", $nama, $jabatan, $whatsapp, $email, $password, $foto, $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "Data guru berhasil diupdate!";
            header("Location: ../index.php");
        } else {
            echo  "id= $id ";
            echo "Tidak ada perubahan dalam data guru.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
