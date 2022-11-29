<?php

require 'function.php';

// tangkap data id dari URL
$id = $_GET ["id"];


// lakukan query data berdasarkan id 
$siswa = query ("SELECT * FROM murid1 WHERE id = $id") [0];
// var_dump($siswa);
// exit;

// cek apakan tombol kirim sudah ditekan
if (isset ($_POST ["tekan"])) {
//   var_dump($_POST);
//   exit;

    // cek apakah data berhasil diubah
    if (ubah ($_POST) > 0) {
        echo "
        <script>
        alert ('Data Berhasil DIubah')
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert ('Data Gagal Diubah');
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>
<body>
    
     <h1>FORM UBAH</h1>

     <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $siswa ["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $siswa ["gambar"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" value="<?= $siswa ["nama"]; ?>">
            </li>
            <li>
                <label for="nis">Nisn: </label>
                <input type="text" name="nisn" id="nisn" value="<?= $siswa ["nisn"]; ?>">
            </li>
            <li>
                <label for="jur">Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $siswa ["jurusan"]; ?>">
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="<?= $siswa ["email"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar: </label><br>
                <img src="img/<?= $siswa ['gambar']; ?>" width="75">
                <input type="file" name="gambar" id="gambar" value="<?= $siswa ["gambar"]; ?>">
            </li>
            <button type="submit" name="tekan">Kirim Data</button>
        </ul>
     </form>

</body>
</html>