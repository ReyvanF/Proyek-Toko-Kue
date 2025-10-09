<?php
include 'config.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
  echo "Pendaftaran berhasil! <a href='login.html'>Masuk Sekarang</a>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
