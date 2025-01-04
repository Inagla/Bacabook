<?php 

require 'functions.php';

// connect ke database
$conn = mysqli_connect("localhost","root","","test");

// cek apakah submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // ambil data dari tiap elemen dalam database
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $genre = $_POST["genre"];
    $tahun = $_POST["tahun"];
    $sinopsis = $_POST["sinopsis"];
    $cover = $_POST["cover"];

    // query insert data
    $query = "INSERT INTO buku
              VALUES
              ('', '$judul', '$penulis', '$genre', '$tahun', '$sinopsis', '$cover')";

    // cek apakah data sudah ditambahkan atau tidak
    if (tambah ($_POST) > 0) {
        echo "
          <script> 
             alert('buku berhasil ditambahkan');
             document.location.href = 'index.php';
          </script>
        ";
    }
    else {
        echo "
             <script> 
             alert('buku gagal ditambahkan');
             document.location.href = 'index.php';
          </script>
          ";
    }


    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>
    
<h1> Tambah Buku </h1>

<form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" id="judul">
        </li>
        <li>
            <label for="penulis">Penulis Buku</label>
            <input type="text" name="penulis" id="penulis">
        </li>
        <li>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre">
        </li>
        <li>
            <label for="tahun">Tahun Terbit</label>
            <input type="text" name="tahun" id="tahun">
        </li>
        <li>
            <label for="cover">Cover</label>
            <input type="file" name="cover" id="cover">
        </li>
        <li>
            <label for="sinopsis">Sinopsis</label>
            <input type="text" name="sinopsis" id="sinopsis">
        </li>
        <li>
            <button type="submit" name="submit">Tambah Buku</button>
        </li>
    </ul>
</form>

</body>
</html>