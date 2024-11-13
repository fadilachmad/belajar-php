<?php
    if(isset($_POST["submit"])) {
        if($_POST["username"] == "admin" && $_POST["password"] == 123) {
            header("Location: admin.php");
            exit;
        } else {
            $error = true;
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
    <h1>Login Admin</h1>
    
    <form action="" method="post">
        <label for="username">Masukkan Username: </label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Masukkan Password: </label>
        <input type="password" name="password" id="password">
        <br>
        <?php if(isset($error)) : ?>
            <p>Username dan Password salah</p>
        <?php endif ?>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
    
</body>
</html>