<?php
include '../koneksi.php';
session_start();

$kd_obat = $_POST['kd_obat'] ?? '';
$nm_obat = $_POST['nm_obat'] ?? '';
$jml_obat = $_POST['jml_obat'] ?? '';
$ukuran = $_POST['ukuran'] ?? '';
$harga = $_POST['harga'] ?? '';

// Validasi input
if (empty($kd_obat) || empty($nm_obat) || empty($jml_obat) || empty($ukuran)  || empty($harga)) {
    header("Location: obat.php?error=1");
    exit;
}

// Simpan data TANPA id_kunjungan
$sql = "INSERT INTO obat (kd_obat, nm_obat, jml_obat, ukuran, harga)
        VALUES ('$kd_obat', '$nm_obat', '$jml_obat', '$ukuran', '$harga')";

if (mysqli_query($koneksi, $sql)) {
    header("Location: obat_data.php?sukses=1");
} else {
    die("Gagal menyimpan data: " . mysqli_error($koneksi));
}
?>
