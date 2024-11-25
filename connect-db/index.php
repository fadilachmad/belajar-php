<?php

    session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    require 'functions.php';
    $mahasiswa = query("SELECT * FROM mahasiswa");

    if(isset($_POST["cari"])) {
        $mahasiswa = cari($_POST["keyword"]);
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
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php">Tambah Mahasiswa</a>
    <form action="" method="post" style="margin: 20px 0">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $row["nama"] ?></td>
            <td><img src="img/<?php echo $row["gambar"] ?>" width="50" alt=""></td>
            <td><?php echo $row["nim"] ?></td>
            <td><?php echo $row["jurusan"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><a href="ubah.php?id=<?php echo $row["id"] ?>">ubah</a> | <a href="hapus.php?id=<?php echo $row["id"] ?>" onclick="return confirm('yakin ingin menghapus?')">hapus</a></td>
        </tr>
        <?php endforeach ?>
    </table>

    <a href="logout.php">Logout</a>
</body>
</html>