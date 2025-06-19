<?php
include '../koneksi.php';
session_start();

$kd_tindakan = $_POST['kd_tindakan'] ?? '';
$nm_tindakan = $_POST['nm_tindakan'] ?? '';
$ket = $_POST['ket'] ?? '';

// Validasi input
if (empty($kd_tindakan) || empty($nm_tindakan) || empty($ket)) {
    header("Location: tindakan.php?error=1");
    exit;
}

// Simpan data TANPA id_kunjungan
$sql = "INSERT INTO tindakan (kd_tindakan, nm_tindakan, ket)
        VALUES ('$kd_tindakan', '$nm_tindakan', '$ket')";

if (mysqli_query($koneksi, $sql)) {
    header("Location: t_data.php?sukses=1");
} else {
    die("Gagal menyimpan data: " . mysqli_error($koneksi));
}
?>
