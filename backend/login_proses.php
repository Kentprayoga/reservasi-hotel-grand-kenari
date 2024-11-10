<?php
session_start();
require_once '../functions/User.php'; // Menghubungkan ke class User

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitasi input
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Buat objek User
    $userObj = new User();

    // Ambil data pengguna berdasarkan username
    $user = $userObj->checkUserExists($username, ''); // Berikan argumen kosong untuk email

    // Periksa apakah user ditemukan dan password cocok
    if ($user && password_verify($password, $user['password'])) {
        // Jika berhasil, simpan informasi sesi
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['role'] = $user['role'];

        // Redirect berdasarkan peran
        if ($user['role'] === 'admin') {
            header("Location: ../admin/index.php"); // Admin ke halaman admin
        } elseif ($user['role'] === 'user') {
            header("Location: ./../index.php"); // User biasa ke dashboard user
        } else {
            // Jika role tidak terdaftar
            $_SESSION['login_error'] = 'Role tidak dikenali.';
            header("Location: ./../login.php");
        }
        exit(); // Hentikan script setelah redirect
    } else {
        $_SESSION['login_error'] = 'Username atau password salah.'; // Set pesan kesalahan di sesi
        header("Location: ./../login.php"); // Redirect ke halaman login
        exit();
    }
}
?>