<?php
    session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require "functions.php";

    $id = $_GET["id"];
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

    if(isset($_POST["submit"])){
        if(ubah($_POST) > 0) {
           echo "<script>alert('Data berhasil diubah'); document.location.href = 'index.php'; </script>";
        } else {
           echo "<script>alert('Data gagal diubah'); document.location.href = 'index.php'; </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
                <input type="hidden" name="gambarLama" value="<?php echo $mhs["gambar"]; ?>">
            </li>
            <li>
                <label for="nim">NIM: </label>
                <input type="text" name="nim" id="nim" value="<?php echo $mhs["nim"]; ?>">
            </li>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" value="<?php echo $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" value="<?php echo $mhs["email"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar: </label> <br>
                <img src="img/<?php echo $mhs['gambar']; ?>" width="40"  alt=""> <br>
                <input type="file" name="gambar" id="gambar" ?>
            </li>
            <li>
                <button type="submit" name="submit">Submit Data</button>
            </li>
        </ul>
    </form>
</body>
</html>