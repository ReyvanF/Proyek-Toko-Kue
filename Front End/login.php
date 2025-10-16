<?php
include("../Assets/Database/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, name, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();

        if ($data && password_verify($password, $data['password'])) {
            $_SESSION['user'] = $data['name'];
            echo "<script>alert('Selamat datang, {$data['name']}!'); window.location='../index.html';</script>";
            exit;
        } else {
            echo "<script>alert('Email atau password salah!');</script>";
        }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Toko Kue Rejaki</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth">
    <div class="auth-form">
        <h2>Masuk ke Akun</h2>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" minlength="8" placeholder="Kata Sandi" required>
            <button type="submit" class="submit-primary">Masuk</button>
        </form>
        <p>Belum punya akun? <a href="signup.php">Daftar sekarang</a></p>
    </div>
</body>
</html>
