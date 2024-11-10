<?php
include "./config/db.php";

// Ambil ID kamar yang ingin dihapus
$idkamar = $_GET['idkamar'] ?? null;
if (!$idkamar) {
    echo "<script>alert('ID kamar tidak ditemukan!'); document.location.href='../kamar.php';</script>";
    exit;
}

// Cek apakah kamar ada
$query = $pdo->prepare("SELECT * FROM kamar WHERE idkamar = ?");
$query->execute([$idkamar]);
$kamar = $query->fetch(PDO::FETCH_ASSOC);

// Cek apakah kamar ditemukan
if (!$kamar) {
    echo "<script>alert('Kamar tidak ditemukan!'); document.location.href='../kamar.php';</script>";
    exit;
}

try {
    // Hapus fasilitas yang terkait dengan kamar
    $sqlDeleteFasilitas = $pdo->prepare("DELETE FROM kamar_fasilitas WHERE idkamar = ?");
    $sqlDeleteFasilitas->execute([$idkamar]);

    // Hapus stok kamar terkait
    $sqlDeleteStok = $pdo->prepare("DELETE FROM stokkamar WHERE idkamar = ?");
    $sqlDeleteStok->execute([$idkamar]);

    // Hapus kamar dari tabel kamar
    $sqlDeleteKamar = $pdo->prepare("DELETE FROM kamar WHERE idkamar = ?");
    $sqlDeleteKamar->execute([$idkamar]);

    echo "<script>alert('Data Kamar Berhasil Dihapus'); document.location.href='kamar.php';</script>";
} catch (PDOException $e) {
    echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
}
?>