<?php
 $conn = mysqli_connect("localhost", "root", "", "phpdasar");

 function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
 }

 function tambah($data) {
    global $conn;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);
    $gambar = htmlspecialchars($data["gambar"]);


    $query = "INSERT INTO mahasiswa VALUES('', '$nim', '$nama', '$jurusan', '$email', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
 }

 function hapus($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);

 }

 function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);
    $gambar = htmlspecialchars($data["gambar"]);


    $query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', jurusan = '$jurusan', email = '$email', gambar = '$gambar' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
 }
 
 function cari($keyword) {
   $query = "SELECT * FROM mahasiswa 
               WHERE 
               nama LIKE '%$keyword%' OR
               nim LIKE '%$keyword%' OR
               jurusan LIKE '%$keyword%' OR
               email LIKE '%$keyword%'
            ";

   return query($query);
 }
?>