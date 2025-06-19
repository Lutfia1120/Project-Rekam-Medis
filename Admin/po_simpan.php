<?php
include '../koneksi.php';
session_start();

$kd_poli = $_POST['kd_poli'] ?? '';
$nm_poli = $_POST['nm_poli'] ?? '';
$lantai = $_POST['lantai'] ?? '';
$ket = $_POST['ket'] ?? '';

// Validasi input
if (empty($kd_poli) || empty($nm_poli) || empty($lantai) ||  empty($ket)) {
    header("Location: poliklinik.php?error=1");
    exit;
}

// Cek apakah data dengan no_pasien sudah ada
$cek = mysqli_query($koneksi, "SELECT kd_poli FROM poliklinik WHERE kd_poli = '$kd_poli'");
if (mysqli_num_rows($cek) > 0) {
    header("Location: poliklinik.php?error=duplikat");
    exit;
}

// Simpan data
$sql = "INSERT INTO poliklinik (kd_poli, nm_poli, lantai, ket)
        VALUES ('$kd_poli', '$nm_poli', '$lantai', '$ket')";

if (mysqli_query($koneksi, $sql)) {
    header("Location: poli_data.php?sukses=1");
} else {
    die("Gagal menyimpan data: " . mysqli_error($koneksi));
}
?>
