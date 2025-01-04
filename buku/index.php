<?php 

session_start();


// harus Login
// if( !isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }

require 'functions.php';

// Ambil nama pengguna dari session jika sudah login
$username = isset($_SESSION["username"]) ? $_SESSION["username"] : '';

$buku = query("SELECT * FROM buku ORDER BY tahun DESC LIMIT 12");

// tombol cari ditekan
if (isset($_GET["cari"])) {
  $buku = cari($_GET["keyword"]);
} 
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BacaBook</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="shortcut icon" href="Home-Pict/logo-buku.png" />
</head>

<body>
    <div class="container">
        <!-- Navigation Bar -->
        <nav class="container-navbar">
            <a class="home-link" href="#">
                <img src="home-pict/logo-buku.png" class="home-button" />
            </a>
            <form action="" method="get" class="search-navbar">
                <input class="search-bar" type="text" name="keyword" placeholder="masukan buku yang ingin dicari"
                    autocomplete="off" />
                <button name="cari" class="search-button" type="submit">
                    <img src="home-pict/search-button.png" class="search-img" />
                </button>
            </form>
            <a class="koleksi-button" href="daftar-buku/daftarbuku.php">Koleksi Buku</a>
            <a href="logout.php" class="nama-akun"><?= $username; ?></a>
        </nav>
        <!-- Navigation Bar End -->

        <!-- Banner -->
        <div class="container-banner">
            <a>
                <img src="home-pict/Screenshot 2024-10-04 104908.png" class="banner-img" />
            </a>
        </div>
        <!-- Banner End -->

        <!-- Content -->

        <main class="container-content">
            <h1 class="batas-content">Buku Terbaru</h1>
            <div class="content-area">
                <?php $i = 1;?>
                <?php foreach ( $buku as $row) : ?>
                <a href="daftar-buku/<?= $row["judul"]; ?>/<?= $row["judul"]; ?>.php" class="content-box">
                    <img src="cover/<?= $row["cover"]; ?>" class="content-img">
                    <p><?= $row["judul"]?></p>
                    <il><?= $row["penulis"]?></il>
                </a>
                <?php $i++; ?>
                <?php endforeach; ?>
            </div>
        </main>

        <!-- Footer -->
        <footer class="container-footer">
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
                <li class="menu__item"><a class="menu__link" href="#">About</a></li>
                <li class="menu__item">
                    <a class="menu__link" href=" https://wa.me/082112916557">Contact</a>
                </li>
            </ul>
        </footer>
    </div>
    <script src="/data.js" type="text/javascript"></script>
</body>

</html>