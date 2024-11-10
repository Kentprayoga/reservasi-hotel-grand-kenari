<?php require ('./view/link.php'); 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    // Arahkan ke halaman login jika pengguna belum login atau bukan admin
    echo "<script>
            alert('Anda harus login sebagai admin untuk mengakses halaman ini.');
            window.location.href = './../login.php';
          </script>";
    exit();
}?>
<style>
.h-font {
    font-family: 'Cardo', serif;
}

/* Membuat navbar tetap berada di atas saat di-scroll */
.container-fluid.bg-dark.text-light {
    position: fixed;
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

/* Responsif untuk perangkat dengan layar lebih kecil dari 992px */
@media screen and (max-width: 992px) {
    .container-fluid.bg-dark.text-light {
        position: relative;
        padding: 10px 15px;
    }

    #dashboard-menu {
        position: relative;
        height: auto;
        width: 100%;
        top: 0;
        display: none;
    }

    #main-content {
        margin-left: 0;
    }

    .navbar-toggler {
        display: block;
    }

    .navbar-collapse {
        width: 100%;
        display: none;
    }

    .navbar-collapse.show {
        display: block;
    }

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
                            <h2>Fasilitas Umum</h2>
                            <div class="alert alert-info mb-3">DATA FASILITAS UMUM</div>
                            <a href="input_fasilitas_umum.php" class="btn btn-primary">Tambah Data</a>
                            <table width="100%" border="1" class="table table-bordered table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Fasilitas</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>

                                <?php  
include 'config/db.php';

// Query untuk mengambil data fasilitas umum dari database
$sql = "SELECT * FROM fasilitas_umu";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$no = 1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

                                <tr>
                                    <td align="center"><?= $no; ?></td>
                                    <td align="center"><?= htmlspecialchars($row['nama_fasilitas']); ?></td>
                                    <td align="center"><?= htmlspecialchars($row['deskripsi']); ?></td>
                                    <td align="center">
                                        <img src="../img/fasilitas/<?= htmlspecialchars($row['gambar']); ?>"
                                            alt="Fasilitas Image" width="100">

                                    </td>
                                    <td align="center">
                                        <a href="edit_fasilitas_umum.php?idf_fasilitas=<?= htmlspecialchars($row['idf_fasilitas']); ?>"
                                            class="btn btn-success">Edit</a>
                                        <a href="backend/hapus_fasilitas_umum.php?idf_fasilitas=<?= htmlspecialchars($row['idf_fasilitas']); ?>"
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