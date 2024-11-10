<?php
include "./config/db.php";
session_start();

// Periksa apakah pengguna telah login dan apakah mereka adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    // Arahkan ke halaman login jika pengguna belum login atau bukan admin
    echo "<script>
            alert('Anda harus login sebagai admin untuk mengakses halaman ini.');
            window.location.href = './../login.php';
          </script>";
    exit();
}
?>

<title>Dashboard Admin</title>
<?php require ('./view/link.php'); ?>
<style>
.h-font {
    font-family: 'Cardo', serif;
}

#dashboard-menu {
    position: absolute;
    height: 100%;
}

@media screen and (max-width: 992px) {
    #dashboard-menu {
        height: auto;
        width: 100%;
    }
}
</style>
<?php require('view/header.php'); ?>
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, reiciendis. Laboriosam molestiae harum
            dolorem tempora eos hic quo, a architecto, est in provident libero ipsum placeat. Reprehenderit quam
            ipsum nulla?
        </div>
    </div>
</div>

<?php require ('./view/script.php'); ?>

</html>