<?php
session_start();


    // Menghapus semua variabel sesi
    session_unset();
    // Mengakhiri sesi
    session_destroy();
    // echo "anda kluar";
    header("Location: home.php");
    exit();


?>