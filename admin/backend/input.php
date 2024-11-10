<?php
include "../config/db.php";

// Ambil data dari form
$tipe = $_POST['tipe'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$gambar = $_FILES['gambar']['name'];

// Tentukan lokasi folder tujuan untuk menyimpan gambar
$targetDir = "../../img/kamar/";
$targetFile = $targetDir . basename($gambar);

// Simpan data kamar
$sqlsimpan = $pdo->prepare("INSERT INTO kamar (tipe, jumlah, harga, gambar) VALUES (?, ?, ?, ?)");
$sqlsimpan->execute([$tipe, $jumlah, $harga, $gambar]);

// Ambil ID kamar yang baru disimpan
$id = $pdo->lastInsertId();

// Simpan stok kamar
$sqlsimpan2 = $pdo->prepare("INSERT INTO stokkamar (idkamar, tipe, stok) VALUES (?, ?, ?)");
$sqlsimpan2->execute([$id, $tipe, $jumlah]);

// Pindahkan gambar yang diupload ke folder tujuan
if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
    // Menyimpan fasilitas yang dipilih
    if (isset($_POST['fasilitas'])) {
        foreach ($_POST['fasilitas'] as $idfasilitas) {
            // Simpan relasi antara kamar dan fasilitas
            $sqlFasilitas = $pdo->prepare("INSERT INTO kamar_fasilitas (idkamar, idfasilitas) VALUES (?, ?)");
            $sqlFasilitas->execute([$id, $idfasilitas]);
        }
    }

    echo "<script>alert('Data Kamar Tersimpan dan Gambar Berhasil Diupload'); document.location.href='../kamar.php';</script>";
} else {
    echo "<script>alert('Gambar gagal diupload. Pastikan folder tujuan dapat ditulis.'); document.location.href='../kamar.php';</script>";
}
?>