<?php
include("../Assets/Database/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    if (!empty($nama) && !empty($email) && !empty($password)) {
        $sql = "INSERT INTO user (name, email, password, unhash_pw) VALUES ('$nama', '$email', '$hash_password', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan.');</script>";
        }
    } else {
        echo "<script>alert('Semua kolom wajib diisi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Toko Kue Rejaki</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth">
    <div class="auth-form">
        <h2>Daftar Akun</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" minlength="8" placeholder="Kata Sandi" required>
            <button type="submit" class="submit-primary">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Masuk di sini</a></p>
    </div>
</body>
</html>