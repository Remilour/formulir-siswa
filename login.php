<?php
session_start();
require 'function.php';

if ( isset ($_POST["submit"])) {
    $username = $_POST ["Username"];
    $password = $_POST ["Password"];
    
    // var_dump($username);
    // var_dump($password);
    // exit;
    // ambil data dari database berdasakan username

    $data = mysqli_query($koneksi, "SELECT * FROM users WHERE Username = '$username'");
    // var_dump($cekData);
    // exit;

    if ( mysqli_num_rows($data) === 1 ) {

        $cekData = mysqli_fetch_assoc($data);

    if ( password_verify($password, $cekData["Password"])) {
        $_SESSION ["Username"] = $cekData ["Username"];
        $_SESSION ["login"] = true;
        header("Location: index.php");

        }
    }
    $error = true;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Formulir Login</h1>
    <?php if (isset($error)) { ?>
        <p style = "color:lightcoral; font-style:italic;"></p>
        <?php } ?>
    <form action="" method="post">
        <label for="Username">Username</label>
        <input type="text" name="Username" id="Username" autocomplete="off">
    <br><br>
        <label for="Password">Password</label>
        <input type="password" name="Password" id="Password">
    <br><br>
        <button type="submit" name="submit"> Kirim </button>
    <br><br>

    </form>
        <a href="register.php"> Sign Up </a>
</body>
</html>
