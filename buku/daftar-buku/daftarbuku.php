<?php 

require '../functions.php';

$buku = query("SELECT * FROM buku ORDER BY judul");

// tombol cari ditekan
if (isset($_GET["cari"])) {
  $buku = cari($_GET["keyword"]);
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="../styles.css" />
</head>

<body>
    <div class="container">
        <!-- Navigation Bar -->
        <nav class="container-navbar">
            <a class="home-link" href="../index.php">
                <img src="../home-pict/logo-buku.png" class="home-button" />
            </a>
            <form action="" method="get" class="search-navbar">
                <input class="search-bar" type="text" name="keyword" size="100%"
                    placeholder="masukan buku yang ingin dicari" autocomplete="off" />
                <button name="cari" class="search-button" type="submit">
                    <img src="../home-pict/search-button.png" class="search-img" />
                </button>
            </form>

            <a class="koleksi-button" href="#">Koleksi Buku</a>
        </nav>
        <!-- Navigation Bar End -->

        <!-- List Buku -->
        <main class="container-content">
            <h1 class="batas-content">Koleksi Buku</h1>
            <div class="content-area">
                <?php $i = 1;?>
                <?php foreach ( $buku as $row) : ?>
                <a href="<?= $row["judul"]; ?>/<?= $row["judul"]; ?>.php" class="content-box">
                    <img src="../cover/<?= $row["cover"]; ?>" class="content-img">
                    <p><?= $row["judul"]?></p>
                    <il><?= $row["penulis"]?></il>
                </a>
                <?php $i++; ?>
                <?php endforeach; ?>
            </div>
        </main>
        <!-- List Buku End -->

        <!-- Footer -->
        <footer class="container-footer">
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
                <li class="menu__item"><a class="menu__link" href="#">About</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Services</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Team</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Contact</a></li>
            </ul>
            <p>@2024 Alghani Falah | All Rights Reserved</p>
        </footer>
    </div>
    <script src="/data.js" type="text/javascript"></script>
</body>

</html>