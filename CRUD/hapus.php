<?php 
    session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require "functions.php";

    $id = $_GET["id"];

    if(hapus($id) > 0) {
        echo "<script>alert('Data berhasil dihapuskan'); document.location.href = 'index.php'; </script>";
    } else {
       echo "<script>alert('Data gagal dihapuskan'); document.location.href = 'index.php'; </script>";
    }
?>