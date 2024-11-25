<?php

    session_start();
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    $jumlahDataPerHalaman = 3;
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    
    
    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $jumlahDataPerHalaman OFFSET $awalData");

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
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari">Cari</button>
    </form>
    <div id="container">
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
    </div>

    <?php if($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&lt;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&gt;</a>
    <?php endif; ?>
    
    <br>
    <br>
    <a href="logout.php">Logout</a>

    <script src="script.js"></script>
</body>
</html>