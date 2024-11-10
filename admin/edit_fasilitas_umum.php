<?php
include "./config/db.php";

// Ambil ID fasilitas umum yang ingin diedit
$idf_fasilitas = $_GET['idf_fasilitas'] ?? null;
if (!$idf_fasilitas) {
    echo "<script>alert('ID fasilitas umum tidak ditemukan!'); document.location.href='../fasilitas_umu.php';</script>";
    exit;
}

// Ambil data fasilitas umum yang akan diedit
$query = $pdo->prepare("SELECT * FROM fasilitas_umu WHERE idf_fasilitas = :idf_fasilitas");
$query->execute([':idf_fasilitas' => $idf_fasilitas]);
$fasilitas = $query->fetch(PDO::FETCH_ASSOC);

// Cek apakah fasilitas umum ditemukan
if (!$fasilitas) {
    echo "<script>alert('Fasilitas umum tidak ditemukan!'); document.location.href='../fasilitas_umum.php';</script>";
    exit;
}

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_fasilitas = $_POST['nama_fasilitas'];
    $deskripsi = $_POST['deskripsi'];
    
    // Proses gambar, jika ada gambar baru
    $gambar = $_FILES['gambar']['name'];
    $targetDir = "../img/fasilitas/";
    $targetFile = $targetDir . basename($gambar);

    try {
        // Proses gambar baru jika ada
        if ($gambar) {
            // Validasi tipe file gambar
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowedTypes)) {
                echo "<script>alert('Hanya file gambar yang diperbolehkan (jpg, jpeg, png, gif).'); document.location.href='../fasilitas_umum.php';</script>";
                exit;
            }

            // Pindahkan gambar baru yang diupload
            if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
                echo "<script>alert('Gambar gagal diupload. Pastikan folder tujuan dapat ditulis.'); document.location.href='../fasilitas_umum.php';</script>";
                exit;
            }

            // Hapus gambar lama jika ada
            if (!empty($fasilitas['gambar'])) {
                $oldImage = $targetDir . $fasilitas['gambar'];
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
            // Update gambar baru di database
            $sqlUpdate = $pdo->prepare("UPDATE fasilitas_umu SET nama_fasilitas = ?, deskripsi = ?, gambar = ? WHERE idf_fasilitas = ?");
            $sqlUpdate->execute([$nama_fasilitas, $deskripsi, $gambar, $idf_fasilitas]);
        } else {
            // Jika tidak ada gambar baru, update tanpa gambar
            $sqlUpdate = $pdo->prepare("UPDATE fasilitas_umu SET nama_fasilitas = ?, deskripsi = ? WHERE idf_fasilitas = ?");
            $sqlUpdate->execute([$nama_fasilitas, $deskripsi, $idf_fasilitas]);
        }

        // Cek apakah query update berhasil
        echo "<script>alert('Fasilitas Umum Berhasil Diedit'); document.location.href='../fasilitas_umum.php';</script>";

    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Fasilitas Umum</title>
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
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto">
                <div class="form-container">
                    <div class="form-input">
                        <div class="card">
                            <div class="card-body">
                                <h2>Edit Fasilitas Umum</h2>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama_fasilitas">Nama Fasilitas Umum</label>
                                        <input type="text" class="form-control" id="nama_fasilitas"
                                            name="nama_fasilitas"
                                            value="<?= htmlspecialchars($fasilitas['nama_fasilitas']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi"
                                            required><?= htmlspecialchars($fasilitas['deskripsi']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar Fasilitas Umum</label>
                                        <input type="file" class="form-control" id="gambar" name="gambar">
                                        <?php if (!empty($fasilitas['gambar'])): ?>
                                        <img src="../img/fasilitas_umu/<?= htmlspecialchars($fasilitas['gambar']); ?>"
                                            width="100" alt="Gambar Fasilitas Umum">
                                        <?php endif; ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="../fasilitas_umu.php" class="btn btn-secondary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require ('./view/script.php'); ?>
</body>

</html>