<?php 

$koneksi = mysqli_connect('localhost','root','','sekolahaul');

function query($query)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, $query); //nilai objek
    $kotakbesar = [];
    while ($kotakkacil = mysqli_fetch_assoc($hasil)){ //array assosiatif
        $kotakbesar [] = $kotakkacil;
    }
    return $kotakbesar;
}

function tambah ($post) {
    global $koneksi;

    $nama = $post["nama"];
    $nisn = $post["nisn"];
    $jurusan = $post["jurusan"];
    $email = $post["email"];
   
    $gambar = upload();
    if (!$gambar){
        return false;
    }
    
    $sql = "INSERT INTO murid1 VALUES (
        '','$nama','$nisn','$jurusan','$email','$gambar'
    )";
    
    mysqli_query ($koneksi, $sql);

    return mysqli_affected_rows($koneksi);

    }
    
    function upload(){
        $namafile = $_FILES ["gambar"]["name"];
        $ukuranfile = $_FILES ["gambar"]["size"];
        $error = $_FILES ["gambar"]["error"];
        $tmpname = $_FILES ["gambar"]["tmp_name"];
        
        if ($error === 4){
            echo"
            <script>
                alert ('Silahkan Pilih Gambar Terlebih Dahulu');
            </script>";
            return false;
        }
        $ekstensiValid = ['jpg','jpeg','png'];
        $ekstensigambar = explode('.', $namafile);
        $ekstensigambar = strtolower(end($ekstensigambar));

        if ( !in_array($ekstensigambar, $ekstensiValid)){
            echo"
            <script>
                alert ('Maaf, file yang di upload bukan gambar:(');
            </script>";
            return false;
        }
        if ($ukuranfile > 500000000){
            echo"
            <script>
                alert('Maaf, ukuran file terlalu besar:(');
            </script>"
            ;
            return false;
        }
        $namafileBaru = uniqid();
        $namafileBaru .= '.';
        $namafileBaru .= $ekstensigambar;
        
        move_uploaded_file($tmpname, 'img/' .$namafileBaru);
        return $namafileBaru;
    }
    function hapus ($id){
        global $koneksi;
        mysqli_query($koneksi, "DELETE FROM  murid1 WHERE id = $id");
        
        return mysqli_affected_rows($koneksi);
    }
    
    function ubah  ($post){
        global $koneksi;
        
        $id = htmlspecialchars($post["id"]);
        $nama = htmlspecialchars($post["nama"]);
        $nisn = htmlspecialchars($post["nisn"]);
        $email = htmlspecialchars($post["email"]);
        $jurusan = htmlspecialchars($post["jurusan"]);
        $gambarLama = htmlspecialchars($post["gambarLama"]);

        if ($_FILES ["gambar"]["error"] === 4) {
            $gambar = $gambarLama;
        } else {
           $gambar = upload();
        }
        $sql = "UPDATE murid1 SET
            nama = '$nama',
            nisn = '$nisn',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            
            WHERE id = $id";
            mysqli_query($koneksi, $sql);
            return mysqli_affected_rows($koneksi);

    }

    function register ($post) {
        global $koneksi;
        $username = strtolower(stripslashes($post["username"]));
        $password = mysqli_real_escape_string($koneksi, $post["password"]);
        $password2 = mysqli_real_escape_string($koneksi, $post["password2"]);

        $result = mysqli_query($koneksi, "SELECT * FROM users WHERE Username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert ('Username Sudah Terdaftar');
            </script>";
        return false;
        }

        if ( $password !== $password2 ) {
            echo "<script>
            alert ('Konfirmasi Password Salah');
            </script>";
        return false;
        }

        $password = password_hash ($password, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "INSERT INTO users VALUES ('', '$username', '$password')");
        return mysqli_affected_rows ($koneksi);

    }

?>