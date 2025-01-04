<?php

// Connect ke database
$conn = mysqli_connect("localhost", "root", "", "test");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $genre = htmlspecialchars($data["genre"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $sinopsis = htmlspecialchars($data["sinopsis"]);

    // upload gambar
    $cover = upload();
    if (!$cover) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO buku VALUES ('', '$judul', '$penulis', '$genre', '$tahun', '$sinopsis', '$cover')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namafile = $_FILES['cover']['name'];
    $ukuranfile = $_FILES['cover']['size'];
    $error = $_FILES['cover']['error'];
    $tmpname = $_FILES['cover']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Upload cover terlebih dahulu');</script>";
        return false;
    }

    $formatcovervalid = ['jpg', 'jpeg', 'png'];
    $formatcover = strtolower(end(explode('.', $namafile)));
    if (!in_array($formatcover, $formatcovervalid)) {
        echo "<script>alert('Upload dengan format file yang jpg, jpeg, atau png');</script>";
        return false;
    }

    if ($ukuranfile > 1000000) {
        echo "<script>alert('Ukuran file terlalu besar');</script>";
        return false;
    }

    $namafilebaru = uniqid() . '.' . $formatcover;
    move_uploaded_file($tmpname, 'cover/' . $namafilebaru);

    return $namafilebaru;
}

function ubah($data) {
    global $conn;
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $genre = htmlspecialchars($data["genre"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $sinopsis = htmlspecialchars($data["sinopsis"]);

    $coverlama = $data["coverlama"];
    
    // Cek apakah user upload cover baru
    if ($_FILES['cover']['error'] === 4) {
        $cover = $coverlama;
    } else {
        $cover = upload();
        if (!$cover) {
            return false;
        }
    }

    $query = "UPDATE buku SET
                judul = '$judul',
                penulis = '$penulis',
                genre = '$genre',
                tahun = '$tahun',
                sinopsis = '$sinopsis',
                cover = '$cover'
              WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM buku WHERE judul LIKE '%$keyword%' OR penulis LIKE '%$keyword%'";
    return query($query);
}

function register($data) {
    global $conn;
    $username = strtolower(stripslashes( $data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $confirm = mysqli_real_escape_string($conn, $data["confirm"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username= '$username'");
    
    if (mysqli_fetch_assoc($result)) {
        echo "<script> 
        alert ('username telah terdaftar')
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !==  $confirm) {
        echo "<script> 
        alert ('konfirmasi password tidak sesuai');
        </script>";
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke data base
    mysqli_query($conn, "INSERT INTO users VALUES('','$username', '$password')");
    
    return mysqli_affected_rows($conn);

    if (isset($_POST["register"])) {
        if (register($_POST)) { // Menggunakan return value dari register untuk memeriksa keberhasilan
            echo "<script>alert('User baru berhasil ditambahkan');</script>";
        } else {
            echo "<script>alert('Gagal menambahkan user. Silakan coba lagi.');</script>";
        }
    }
}

?>