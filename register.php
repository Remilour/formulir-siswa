<?php

require 'function.php';

if ( isset ($_POST["tekan"])) {
    if ( register ($_POST) > 0 ) {
    echo "<script>
    alert ('User Baru Berhasil Ditambahkan');
    document.location.href = 'login.php';
    </script>";

    return false;
} else {
    echo mysqli_error($koneksi);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>

    
    <h1>Formulir Registrasi</h1>
    <form action="" method="POST">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <br><br>
    <label for="password">Password</label>
    <input type="text" name="password" id="password">
    <br><br>
    <label for="password2">Konfirmasi Password</label>
    <input type="text" name="password2" id="password2">
    <br><br>
    <button type="submit" name="tekan">Kirim</button>
    </form>
    <br>
    <a href="login.php">Kembali Ke Halaman Login</a>

</form>
</body>
</html>