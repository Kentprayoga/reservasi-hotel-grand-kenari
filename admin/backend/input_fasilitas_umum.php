<?php
include "../config/db.php";

// Ambil data dari form
$nama_fasilitas = $_POST['nama_fasilitas'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar']['name'];

// Tentukan lokasi folder tujuan untuk menyimpan gambar
$targetDir = "../../img/fasilitas/";
$targetFile = $targetDir . basename($gambar);

// Simpan data fasilitas umum
$sqlsimpan = $pdo->prepare("INSERT INTO fasilitas_umu (nama_fasilitas, deskripsi, gambar) VALUES (?, ?, ?)");
$sqlsimpan->execute([$nama_fasilitas, $deskripsi, $gambar]);

// Ambil ID fasilitas yang baru disimpan
$id = $pdo->lastInsertId();

// Pindahkan gambar yang diupload ke folder tujuan
if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
    echo "<script>alert('Data Fasilitas Umum Tersimpan dan Gambar Berhasil Diupload'); document.location.href='../fasilitas_umum.php';</script>";
} else {
    echo "<script>alert('Gambar gagal diupload. Pastikan folder tujuan dapat ditulis.'); document.location.href='../fasilitas_umum.php';</script>";
}
?>