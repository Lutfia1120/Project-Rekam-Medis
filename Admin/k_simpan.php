<?php
include '../koneksi.php';
session_start();

$tgl_kunjungan = $_POST['tgl_kunjungan'] ?? '';
$no_pasien = $_POST['no_pasien'] ?? '';
$kd_poli = $_POST['kd_poli'] ?? '';
$jam_kunjungan = $_POST['jam_kunjungan'] ?? '';

// Validasi input
if (empty($tgl_kunjungan) || empty($no_pasien) || empty($kd_poli) || empty($jam_kunjungan)) {
    header("Location: kunjungan.php?error=1");
    exit;
}

// Simpan data TANPA id_kunjungan
$sql = "INSERT INTO kunjungan (tgl_kunjungan, no_pasien, kd_poli, jam_kunjungan)
        VALUES ('$tgl_kunjungan', '$no_pasien', '$kd_poli', '$jam_kunjungan')";

if (mysqli_query($koneksi, $sql)) {
    header("Location: k_data.php?sukses=1");
} else {
    die("Gagal menyimpan data: " . mysqli_error($koneksi));
}
?>
