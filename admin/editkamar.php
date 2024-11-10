<?php
include "./config/db.php";

// Ambil ID kamar yang ingin diedit
$idkamar = $_GET['idkamar'] ?? null;
if (!$idkamar) {
    echo "<script>alert('ID kamar tidak ditemukan!'); document.location.href='../kamar.php';</script>";
    exit;
}

// Ambil data kamar yang akan diedit
$query = $pdo->prepare("SELECT * FROM kamar WHERE idkamar = ?");
$query->execute([$idkamar]);
$kamar = $query->fetch(PDO::FETCH_ASSOC);

// Cek apakah kamar ditemukan
if (!$kamar) {
    echo "<script>alert('Kamar tidak ditemukan!'); document.location.href='../kamar.php';</script>";
    exit;
}

// Ambil fasilitas yang sudah dipilih untuk kamar ini
$fasilitasKamar = [];
$queryFasilitasCheck = $pdo->prepare("SELECT idfasilitas FROM kamar_fasilitas WHERE idkamar = ?");
$queryFasilitasCheck->execute([$idkamar]);
while ($row = $queryFasilitasCheck->fetch(PDO::FETCH_ASSOC)) {
    $fasilitasKamar[] = $row['idfasilitas'];
}

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipe = $_POST['tipe'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    
    // Proses gambar, jika ada gambar baru
    $gambar = $_FILES['gambar']['name'];
    $targetDir = "../img/kamar/";
    $targetFile = $targetDir . basename($gambar);

    try {
        // Proses gambar baru jika ada
        if ($gambar) {
            // Pindahkan gambar baru yang diupload
            if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
                echo "<script>alert('Gambar gagal diupload. Pastikan folder tujuan dapat ditulis.'); document.location.href='../kamar.php';</script>";
            }
            // Update gambar baru di database
            $sqlUpdate = $pdo->prepare("UPDATE kamar SET tipe = ?, jumlah = ?, harga = ?, gambar = ? WHERE idkamar = ?");
            $sqlUpdate->execute([$tipe, $jumlah, $harga, $gambar, $idkamar]);
        } else {
            // Jika tidak ada gambar baru, update tanpa gambar
            $sqlUpdate = $pdo->prepare("UPDATE kamar SET tipe = ?, jumlah = ?, harga = ? WHERE idkamar = ?");
            $sqlUpdate->execute([$tipe, $jumlah, $harga, $idkamar]);
        }

        // Hapus fasilitas lama
        $sqlDeleteFasilitas = $pdo->prepare("DELETE FROM kamar_fasilitas WHERE idkamar = ?");
        $sqlDeleteFasilitas->execute([$idkamar]);

        // Menyimpan fasilitas yang dipilih
        if (isset($_POST['fasilitas'])) {
            foreach ($_POST['fasilitas'] as $idfasilitas) {
                // Simpan relasi antara kamar dan fasilitas
                $sqlFasilitas = $pdo->prepare("INSERT INTO kamar_fasilitas (idkamar, idfasilitas) VALUES (?, ?)");
                $sqlFasilitas->execute([$idkamar, $idfasilitas]);
            }
        }

        // Cek apakah query update berhasil
        echo "<script>alert('Data Kamar Berhasil Diedit'); document.location.href='kamar.php';</script>";

    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Kamar</title>
    <?php require ('./view/link.php'); ?>
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

<body>
    <?php include "view/header.php"; ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto">
                <div class="form-container">
                    <div class="form-input">
                        <div class="card">
                            <div class="card-body">
                                <h2>Edit Kamar</h2>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="tipe">Tipe Kamar</label>
                                        <input type="text" class="form-control" id="tipe" name="tipe"
                                            value="<?= htmlspecialchars($kamar['tipe']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Kamar</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                                            value="<?= htmlspecialchars($kamar['jumlah']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga"
                                            value="<?= htmlspecialchars($kamar['harga']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar Kamar</label>
                                        <input type="file" class="form-control" id="gambar" name="gambar">
                                        <?php if (!empty($kamar['gambar'])): ?>
                                        <img src="../../img/kamar/<?= htmlspecialchars($kamar['gambar']); ?>"
                                            width="100" alt="Gambar Kamar">
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="fasilitas">Fasilitas</label><br>
                                        <?php
                // Ambil semua fasilitas
                $queryFasilitas = $pdo->query("SELECT * FROM fasilitas");
                while ($fasilitas = $queryFasilitas->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                                        <input type="checkbox" name="fasilitas[]"
                                            value="<?= $fasilitas['idfasilitas']; ?>"
                                            <?php if (in_array($fasilitas['idfasilitas'], $fasilitasKamar)) echo 'checked'; ?>>
                                        <?= htmlspecialchars($fasilitas['nama_fasilitas']); ?><br>
                                        <?php
                }
                ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="../kamar.php" class="btn btn-secondary">Kembali</a>
                                </form>
                            </div>

                            <?php require ('./view/script.php'); ?>
</body>

</html>