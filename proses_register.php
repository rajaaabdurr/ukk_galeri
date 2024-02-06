<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];

$sql = mysqli_query($conn, "insert into user values('','$username','$password','$email','$namalengkap','$alamat')");

// Setelah proses registrasi berhasil
// Misalnya, setelah query INSERT ke database berhasil
header("Location: login.php?registrasi=sukses");
exit(); // Pastikan untuk menghentikan eksekusi skrip setelah pengalihan halaman
