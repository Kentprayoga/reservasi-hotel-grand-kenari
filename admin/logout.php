<?php
session_start();
session_unset();
session_destroy();
header("Location: ./../login.php"); // Arahkan ke halaman utama setelah logout
exit();
?>