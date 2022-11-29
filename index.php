<?php 

//koneksidatabase

require 'function.php';

$hasil = query ("SELECT * FROM murid1");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <h1>Daftar Data Siswa</h1>
    <a href="tambah.php">Tambah Data Siswa</a>
    <br><br>
    <table bgcolor= BlanchedAlmond border="1">
        <tr bgcolor=White>
            <td>Id:</td>
            <td>Nama:</td>
            <td>Nisn:</td>
            <td>Jurusan:</td>
            <td>Email</td>
            <td>Gambar:</td>
            <td>Aksi:</td>
        </tr>
        <?php $i = 1;?>
        <?php foreach ($hasil as $cetak) : ?>
        <tr>
           <td><?= $i; ?></td>
           <td><?=$cetak ['nama']?></td>
           <td><?=$cetak ['nisn']?></td>
           <td><?=$cetak ['jurusan']?></td>
           <td><?=$cetak ['email']?></td>
           <td><img src="img/<?= $cetak ['gambar']; ?>" width="100"></td>
           <td>
            <a href="ubah.php?id=<?=$cetak ['id']?>">Ubah</a>
            <a href="hapus.php?id=<?=$cetak ['id']?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
           </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach ?>
    </table>
</body>
</html>