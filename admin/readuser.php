<?php

// Tambahkan koneksi ke database
require_once './config/db.php';
include 'config/db.php'; // pastikan db.php sudah menginisialisasi variabel $pdo
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    // Arahkan ke halaman login jika pengguna belum login atau bukan admin
    echo "<script>
            alert('Anda harus login sebagai admin untuk mengakses halaman ini.');
            window.location.href = './../login.php';
          </script>";
    exit();
}
?>

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
<?php include "view/header.php"; ?>
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto">
            <div class="form-container">
                <div class="form-input">
                    <div class="card">
                        <div class="card shadow">
                            <div class="card-header bg-dark text-white">
                                <h4 class="mb-0">Data tamu</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <th>Nomor HP</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = $pdo->query("SELECT * FROM users WHERE role = 'user'");
                                            while ($caridata = $sql->fetch()) {
                                                $id = $caridata['user_id'];
                                                $username = $caridata['username'];
                                                $email = $caridata['email'];
                                                $nama = $caridata['nama_lengkap'];
                                                $alamat = $caridata['alamat'];
                                                $telepon = $caridata['nomor_hp'];
                                        ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $username ?></td>
                                            <td><?php echo $email ?></td>
                                            <td><?php echo $nama ?></td>
                                            <td><?php echo $alamat ?></td>
                                            <td><?php echo $telepon ?></td>
                                            <td>
                                                <a href="backend/deleteuser.php?id=<?php echo $id ?>"
                                                    onclick="return confirm('Hapus User?')"
                                                    class="btn btn-danger btn-sm">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>