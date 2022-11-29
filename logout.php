<?php
session_start();
require 'function.php';

if ( issest ($_POST["submit"])) {
    $username = $_POST ["username"];
    $password = $_POST ["password"];
    
    // var_dump($username);
    // var_dump($password);
    // exit;
    // ambil data dari database berdasakan username

    $data = mysqli_query($koneksi, "SELECT * FROM users WHERE Username = '$username'");
    // var_dump($cekData);
    // exit;

    if ( mysqli_num_rows($data) === 1 ) {

        $cekData = mysqli_fetch_assoc($data);

    if ( password_verify($password, $cekData["password"])) {
        $_SESSION ["username"] = $cekData ["username"];
        $_SESSION ["login"] = true;
        header


    }
}


?>
