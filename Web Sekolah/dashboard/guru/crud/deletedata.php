<?php
include "../../../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buat perintah SQL untuk menghapus data guru berdasarkan ID
    $sql = "DELETE FROM guru WHERE id_guru = ?";
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Data guru berhasil dihapus!";
            header("Location: ../index.php");
        } else {
            echo "Tidak ada data guru yang dihapus.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
