<?php
    require "functions.php";

    if(isset($_POST["registrasi"])) {
            if(registrasi($_POST) > 0) {
                echo "<script> alert('user baru berhasil ditambahkan'); </script>";
            } else {
                echo mysqli_error($conn);
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h1>Halaman Registrasi</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username: </label> <br>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password: </label> <br>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi Password: </label> <br>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <br>
                <button type="submit" name="registrasi">Registrasi</button>
            </li>
        </ul>
    </form>
</body>
</html>