<?php
require 'functions.php';

if (isset($_POST["register"])) {
    if (register($_POST)) {
        echo "<script>alert('User baru berhasil ditambahkan');</script>";
    } else {
        echo "<script>alert('Gagal menambahkan user. Silakan coba lagi.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BacaBook</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="shortcut icon" href="Home-Pict/logo-buku.png" />

</head>

<body>

    <div class="container">
        <!-- Navigation Bar -->
        <nav class="container-navbar">
            <a class="home-link" href="index.php">
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
        </nav>
        <!-- Navigation Bar End -->


        <!-- Content -->
        <div class="container-login">
            <main>
                <h1> Daftar Ke BacaBook </h1>
                <div>
                    <form action="" method="post">
                        <ul>
                            <li>
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username">
                            </li>
                            <li>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password">
                            </li>
                            <li>
                                <label for="confirm">Konfirmasi Password</label>
                                <input type="password" name="confirm" id="confirm">
                            </li>
                            <li>
                                <button type="submit" name="register">Register!</button>
                            </li>
                        </ul>
                        <p>sudah punya akun? <a href="login.php">Login disini</a> </p>
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class=" container-footer">
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
                <li class="menu__item"><a class="menu__link" href="#">About</a></li>
                <li class="menu__item">
                    <a class="menu__link" href=" https://wa.me/082112916557">Contact</a>
                </li>
            </ul>
        </footer>
    </div>
</body>

</html>