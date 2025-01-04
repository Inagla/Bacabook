<?php 

session_start();

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Ambil data dari URL
$id = $_GET["id"];

// Query data buku berdasarkan ID
$bk = query("SELECT * FROM buku WHERE id = $id")[0];

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
          <script> 
             alert('Data berhasil diubah');
             document.location.href = 'index.php';
          </script>
        ";
    } else {
        echo "<script>alert('Data gagal diubah');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Buku</title>
</head>

<body>

    <h1>Ubah Buku</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $bk["id"]; ?>">
        <input type="hidden" name="coverlama" value="<?= $bk["cover"]; ?>">
        <ul>
            <li>
                <label for="judul">Judul Buku</label>
                <input type="text" name="judul" id="judul" required value="<?= $bk["judul"]; ?>">
            </li>

            <li>
                <label for="penulis">Penulis Buku</label>
                <input type="text" name="penulis" id="penulis" required value="<?= $bk["penulis"]; ?>">
            </li>
            <li>
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" required value="<?= $bk["genre"]; ?>">
            </li>
            <li>
                <label for="tahun">Tahun Terbit</label>
                <input type="text" name="tahun" id="tahun" required value="<?= $bk["tahun"]; ?>">
            </li>
            <li>
                <label for="cover">Cover</label>
                <br>
                <img src="cover/<?= $bk['cover']; ?>" width="50">
                <br>
                <input type="file" name="cover" id="cover">
            </li>
            <li>
                <label for="sinopsis">Sinopsis</label>
                <input type="text" name="sinopsis" id="sinopsis" required value="<?= $bk["sinopsis"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Buku</button>
            </li>
        </ul>
    </form>

</body>

</html>