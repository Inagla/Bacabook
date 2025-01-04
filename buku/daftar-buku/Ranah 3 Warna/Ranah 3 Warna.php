<?php 

require '../../functions.php';

$buku = query("SELECT * FROM buku WHERE judul = 'Ranah 3 Warna' ");
$row = $buku[0];

?>


<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $row ["judul"]; ?></title>
    <link rel="stylesheet" href="../../styles.css" />
    <link rel="shortcut icon" href="../../Home-Pict/logo-buku.png" />
</head>

<body>
    <div class="container">
        <!-- Navigation Bar -->
        <div class="container-navbar">
            <a class="home-link" href="../../index.php">
                <img src="../../home-pict/logo-buku.png" class="home-button" />
            </a>
            <form class="search-navbar" onsubmit="return searchFunction()">
                <input class="search-bar" id="search-bar" type="search" placeholder="Cari buku disini"
                    aria-label="search" />
                <button class="search-button" type="submit">
                    <img src="../../home-pict/search-button.png" class="search-img" />
                </button>
            </form>
            <a class="koleksi-button" href="../../Daftar Buku/listbuku.html">Koleksi Buku</a>
        </div>
        <!-- Navigation Bar End -->

        <!-- Content -->
        <div class="container-content">
            <div class="container-details">
                <div class="container-book-title">
                    <div class="container-img-genre">
                        <img src="../../cover/<?= $row ["cover"];?>" class="book-img-details" />
                        <div class="container-box-genre">
                            <a class="box-genre"><?= $row ["genre"]; ?> </a>
                        </div>
                    </div>
                    <div class="container-book-sinopsis">
                        <h1 class="book-title"><?= $row ["judul"]; ?> </h1>
                        <h4 class="writter-name"><?= $row ["penulis"]; ?> </h4>
                        <p class="text-sinopsis">
                            <?= $row ["sinopsis"] ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="container-bab">
                <div class="container-daftar-bab">
                    <h3>Daftar Bab</h3>
                    <a href="isibuku/isibuku.php" class="link-bab">Bab 1</a>
                    <a href="Bab-bab/bab2.html" class="link-bab">Bab 2</a>
                    <a href="" class="link-bab">Bab 3</a>
                    <a href="" class="link-bab">Bab 4</a>
                    <a href="" class="link-bab">Bab 5</a>
                    <a href="" class="link-bab">Bab 6</a>
                    <a href="" class="link-bab">Bab 7</a>
                    <a href="" class="link-bab">Bab 8</a>
                    <a href="" class="link-bab">Bab 9</a>
                    <a href="" class="link-bab">Bab 10</a>
                    <a href="" class="link-bab">Bab 11</a>
                    <a href="" class="link-bab">Bab 12</a>
                    <a href="" class="link-bab">Bab 13</a>
                    <a href="" class="link-bab">Bab 14</a>
                    <a href="" class="link-bab">Bab 15</a>
                    <a href="" class="link-bab">Bab 16</a>
                    <a href="" class="link-bab">Bab 17</a>
                    <a href="" class="link-bab">Bab 18</a>
                    <a href="" class="link-bab">Bab 19</a>
                    <a href="" class="link-bab">Bab 20</a>
                    <a href="" class="link-bab">Bab 21</a>
                    <a href="" class="link-bab">Bab 22</a>
                    <a href="" class="link-bab">Bab 23</a>
                    <a href="" class="link-bab">Bab 24</a>
                    <a href="" class="link-bab">Bab 25</a>
                    <a href="" class="link-bab">Bab 26</a>
                    <a href="" class="link-bab">Bab 27</a>
                    <a href="" class="link-bab">Bab 28</a>
                    <a href="" class="link-bab">Bab 29</a>
                    <a href="" class="link-bab">Bab 30</a>
                    <a href="" class="link-bab">Bab 31</a>
                    <a href="" class="link-bab">Bab 32</a>
                    <a href="" class="link-bab">Bab 33</a>
                    <a href="" class="link-bab">Bab 34</a>
                    <a href="" class="link-bab">Bab 35</a>
                    <a href="" class="link-bab">Bab 36</a>
                    <a href="" class="link-bab">Bab 37</a>
                    <a href="" class="link-bab">Bab 38</a>
                    <a href="" class="link-bab">Bab 39</a>
                    <a href="" class="link-bab">Bab 40</a>
                    <a href="" class="link-bab">Bab 41</a>
                    <a href="" class="link-bab">Bab 42</a>
                    <a href="" class="link-bab">Bab 43</a>
                    <a href="" class="link-bab">Bab 44</a>
                    <a href="" class="link-bab">Bab 45</a>
                </div>
            </div>
        </div>
        <!-- Content End -->

        <!-- Footer -->
        <footer class="container-footer">
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
                <li class="menu__item"><a class="menu__link" href="#">About</a></li>
                <li class="menu__item">
                    <a class="menu__link" href="#">Services</a>
                </li>
                <li class="menu__item"><a class="menu__link" href="#">Team</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Contact</a></li>
            </ul>
            <p>@2024 Alghani Falah | All Rights Reserved</p>
        </footer>
    </div>
    <script src="/data.js" type="text/javascript"></script>
</body>

</html>