<?php 

session_start();

require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

     // ambil username berdasarkan id
     $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
     $row = mysqli_fetch_assoc($result);

    //  cek cookie dan username
    if ($key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }



if (isset($_SESSION["login"])) {
    header("Location: index.php");
}
}

$username = "";
$password = "";

   if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
   }

   $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

//    cek username
    if(mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            
             //  set session
              $_SESSION["login"] = true;
              $_SESSION["username"] = $row["username"];

            //   cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time()+ 60);
            }


            header("Location: index.php");
            exit;
        }
     else {
        $error = true; // Password salah
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
                <h1>Login Ke BacaBook</h1>
                <div>
                    <?php if(isset ($error)): ?>
                    <p style="color: red;">Username atau password salah!</p>
                    <?php endif; ?>

                    <form action="" method="post">
                        <ul>
                            <li>
                                <label for="username">Username </label>
                                <input type="text" name="username" id="username">
                            </li>
                            <li>
                                <label for="password">Password </label>
                                <input type="password" name="password" id="password">
                            </li>
                            <li>
                                <button type="submit" name="login"> Login </button>
                            </li>
                        </ul>
                    </form>
                    <p>belum punya akun? <a href="registrasi.php">Daftar disini</a></p>
                </div>
            </main>
        </div>

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
</body>

</html>