<?php require ('./view/link.php'); 
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
<style>
.h-font {
    font-family: 'Cardo', serif;
}

/* Membuat navbar tetap berada di atas saat di-scroll */
.container-fluid.bg-dark.text-light {
    position: fixed;
    /* Navbar tetap berada di atas */
    top: 0;
    left: 0;
    right: 0;
    z-index: 999;
    padding: 10px 20px;
    background-color: #343a40;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Memberikan jarak tambahan pada body agar konten tidak tertutup oleh navbar */
body {
    padding-top: 70px;
    /* Sesuaikan dengan tinggi navbar */
}

/* Menu samping/dashboard tetap di posisi kiri */
#dashboard-menu {
    position: fixed;
    top: 70px;
    left: 0;
    height: 100%;
    width: 200px;
    z-index: 998;
    overflow-y: auto;
}

/* Memberikan ruang di kiri untuk konten utama */

/* Responsif untuk perangkat dengan layar lebih kecil dari 992px */
@media screen and (max-width: 992px) {

    /* Menyesuaikan navbar agar tetap terlihat dengan lebar layar kecil */
    .container-fluid.bg-dark.text-light {
        position: relative;
        /* Navbar tidak fixed untuk layar kecil */
        padding: 10px 15px;
    }

    /* Menu samping disembunyikan dan tampilkan tombol hamburger */
    #dashboard-menu {
        position: relative;
        height: auto;
        width: 100%;
        top: 0;
        display: none;
        /* Menyembunyikan menu pada perangkat kecil */
    }

    /* Mengubah layout utama ketika menu samping disembunyikan */
    #main-content {
        margin-left: 0;
    }

    /* Menampilkan tombol hamburger */
    .navbar-toggler {
        display: block;
        /* Menampilkan tombol hamburger */
    }

    /* Membuat menu dropdown untuk mobile */
    .navbar-collapse {
        width: 100%;
        display: none;
        /* Menyembunyikan menu secara default */
    }

    .navbar-collapse.show {
        display: block;
        /* Menampilkan menu ketika hamburger diklik */
    }

    /* Menyesuaikan tampilan navbar untuk mobile */
    .navbar-nav {
        flex-direction: column;
    }

    .nav-item {
        text-align: center;
    }

    .nav-link {
        padding: 10px;
    }
}
</style>
<?php include "view/header.php"; ?>
<div class="container-fluid mt-4 mb-4" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto">
            <div class="form-container">
                <div class="form-input">
                    <div class="card">
                        <div class="card-body">
                            <h2>Fasilitas Kamar</h2>
                            <div class="alert alert-info mb-3">DATA FASILITAS</div>
                            <a href="input_fasilitas.php" class="btn btn-primary">Tambah Data</a>
                            <table width="100%" border="1" class="table table-bordered table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Fasilitas</th>
                                    <th>Aksi</th>
                                </tr>

                                <?php  
include 'config/db.php';

// Query untuk mengambil data fasilitas dari database
$sql = "SELECT * FROM fasilitas";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$no = 1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

                                <tr>
                                    <td align="center"><?= $no; ?></td>
                                    <td align="center"><?= htmlspecialchars($row['nama_fasilitas']); ?></td>
                                    <td align="center">
                                        <a href="editfasilitas.php?idfasilitas=<?= htmlspecialchars($row['idfasilitas']); ?>"
                                            class="btn btn-success">Edit</a>
                                        <a href="backend/hapusfasilitas.php?idfasilitas=<?= htmlspecialchars($row['idfasilitas']); ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus fasilitas ini?')">Hapus</a>
                                    </td>
                                </tr>

                                <?php 
    $no++;
}
?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>