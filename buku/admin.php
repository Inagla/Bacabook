<?php 

require 'functions.php';



$buku = query("SELECT * FROM buku");
// ambil data dari tabel buku
// $_result = mysqli_query($db, "SELECT * FROM buku");

// ambil data (fetch) dari object result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array assosiatif
// mysqli_fetch_array() // mengembalikan array numerik dan asssosiatif
// mysqli_fetch_object() // memanggil objek

// while ($bk = mysqli_fetch_assoc($result) ) {
// var_dump($bk);
// }

// tombol cari ditekan
if (isset($_GET["cari"])) {
    $buku = cari($_GET["keyword"]);
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>

    <h1> Daftar Mahasiswa </h1>

    <a href="tambah.php"> Tambah Buku </a>
    <br> </br>

    <form action="" method="get">
        <input type="text" name="keyword" size="100%" placeholder="masukan buku yang ingin dicari" autocomplete="off">
        <button type="submit" name="cari">Cari Buku</button>
        </input>
    </form>

    <br> </br>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th> No </th>
            <th> Judul</th>
            <th> Penulis </th>
            <th> Genre </th>
            <th> Tahun Terbit </th>
            <th> Sinopsis </th>
            <th> Cover</th>
            <th> Aksi </th>
        </tr>

        <?php $i = 1;?>
        <?php foreach ( $buku as $row) : ?>
        <tr>
            <td> <?= $i ?> </td>
            <td> <?= $row["judul"]?> </td>
            <td> <?= $row["penulis"]?> </td>
            <td> <?= $row["genre"]?> </td>
            <td> <?= $row["tahun"]?> </td>
            <td> <?= $row["sinopsis"]?></td>
            <td> <img src="cover/<?= $row["cover"]; ?>" width=50></td>
            <td>
                <a href="ubah.php?id=<?= $row ["id"]; ?> ">Ubah</a> /
                <a href="hapus.php?id= <?= $row["id"] ?>" onclick="
        return confirm('yakin?');">Hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>

</body>

</html>