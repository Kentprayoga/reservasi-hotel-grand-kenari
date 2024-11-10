<?php
// Masukkan koneksi database
include "./config/db.php";

// Ambil ID fasilitas dari URL
$idfasilitas = filter_input(INPUT_GET, 'idfasilitas', FILTER_VALIDATE_INT);

// Cek apakah idfasilitas valid
if (!$idfasilitas) {
    echo "<script>alert('ID fasilitas tidak ditemukan atau tidak valid!'); document.location.href='fasilitas.php';</script>";
    exit;
}

// Ambil data fasilitas yang akan diedit
$query = $pdo->prepare("SELECT * FROM fasilitas WHERE idfasilitas = ?");
$query->execute([$idfasilitas]);
$fasilitas = $query->fetch(PDO::FETCH_ASSOC);

// Cek apakah fasilitas ditemukan
if (!$fasilitas) {
    echo "<script>alert('Fasilitas tidak ditemukan!'); document.location.href='fasilitas.php';</script>";
    exit;
}

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data nama fasilitas dari form
    $nama_fasilitas = trim($_POST['nama_fasilitas']);

    // Validasi input
    if (empty($nama_fasilitas)) {
        echo "<script>alert('Nama fasilitas tidak boleh kosong!');</script>";
    } else {
        try {
            // Update nama fasilitas
            $sqlUpdate = $pdo->prepare("UPDATE fasilitas SET nama_fasilitas = ? WHERE idfasilitas = ?");
            $sqlUpdate->execute([$nama_fasilitas, $idfasilitas]);

            // Cek apakah query update berhasil
            if ($sqlUpdate->rowCount() > 0) {
                echo "<script>alert('Fasilitas Berhasil Diedit'); document.location.href='fasilitas.php';</script>";
            } else {
                echo "<script>alert('Tidak ada perubahan yang dilakukan');</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Fasilitas</title>
    <?php require('./view/link.php'); ?>
</head>
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
        /* Navbar tidak fixed untuk layar kecil */
        padding: 10px 15px;
    }

    /* Menu samping disembunyikan dan tampilkan tombol hamburger */
    #dashboard-menu {
        height: auto;
        width: 100%;
        top: 0;
        display: none;
        /* Menyembunyikan menu pada perangkat kecil */
    }
}
</style>

<body>
    <?php include "view/header.php"; ?>
    <div class="container-fluid mt-4 mb-4" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto">
                <div class="form-container">
                    <div class="form-input">
                        <div class="card">
                            <div class="card-body">
                                <h2>Edit Fasilitas</h2>
                                <form action="edit_fasilitas.php?idfasilitas=<?= $idfasilitas ?>" method="POST">
                                    <div class="form-group">
                                        <label for="nama_fasilitas">Nama Fasilitas</label>
                                        <input type="text" class="form-control" id="nama_fasilitas"
                                            name="nama_fasilitas"
                                            value="<?= htmlspecialchars($fasilitas['nama_fasilitas']); ?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="fasilitas.php" class="btn btn-secondary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('./view/script.php'); ?>
</body>

</html>