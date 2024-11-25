<?php
    require '../functions.php';

    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM mahasiswa 
               WHERE 
               nama LIKE '%$keyword%' OR
               nim LIKE '%$keyword%' OR
               jurusan LIKE '%$keyword%' OR
               email LIKE '%$keyword%'";
               
    $mahasiswa = query($query);
?>

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