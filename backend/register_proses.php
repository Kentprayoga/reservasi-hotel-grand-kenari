<?php
session_start();
require_once '../functions/user.php'; // Menghubungkan ke class User

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari POST
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    $role = 'user';

    // Buat objek User
    $user = new User();

    // Periksa apakah username atau email sudah ada
    if ($user->checkUserExists($username, $email)) {
        echo "<script type='text/javascript'>alert('Username atau email sudah terdaftar.');</script>";
    } else {
        // Masukkan data baru ke dalam tabel Users
        if ($user->registerUser($nama, $email, $username, $password, $nomor_hp, $alamat, $role)) {
            echo "<script type='text/javascript'>
                    alert('Registrasi berhasil! Silakan login.');
                    window.location.href = './../login.php';
                  </script>";
        } else {
            echo "<script type='text/javascript'>alert('Gagal melakukan registrasi.');</script>";
        }
    }
}
?>