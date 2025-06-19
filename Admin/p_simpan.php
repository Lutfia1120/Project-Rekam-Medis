<?php
include '../koneksi.php';
session_start();

$no_pasien = $_POST['no_pasien'] ?? '';
$nm_pasien = $_POST['nm_pasien'] ?? '';
$j_kel = $_POST['j_kel'] ?? '';
$agama = $_POST['agama'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$tgl_lahir = $_POST['tgl_lahir'] ?? '';
$usia = $_POST['usia'] ?? '';
$no_telp = $_POST['no_telp'] ?? '';
$nm_kk = $_POST['nm_kk'] ?? '';
$hub_kel = $_POST['hub_kel'] ?? '';

// Validasi input
if (empty($no_pasien) || empty($nm_pasien) || empty($j_kel) || $agama === '-- Pilih Agama --' || empty($alamat) || empty($tgl_lahir) || empty($usia) || empty($no_telp) || empty($nm_kk) || $hub_kel === '-- Pilih Hubungan --') {
    header("Location: pasien.php?error=1");
    exit;
}

// Cek apakah data dengan no_pasien sudah ada
$cek = mysqli_query($koneksi, "SELECT no_pasien FROM pasien WHERE no_pasien = '$no_pasien'");
if (mysqli_num_rows($cek) > 0) {
    header("Location: pasien.php?error=duplikat");
    exit;
}

// Simpan data
$sql = "INSERT INTO pasien (no_pasien, nm_pasien, j_kel, agama, alamat, tgl_lahir, usia, no_telp, nm_kk, hub_kel)
        VALUES ('$no_pasien', '$nm_pasien', '$j_kel', '$agama', '$alamat', '$tgl_lahir', '$usia', '$no_telp', '$nm_kk', '$hub_kel')";

if (mysqli_query($koneksi, $sql)) {
    header("Location: pasien_data.php?sukses=1");
} else {
    die("Gagal menyimpan data: " . mysqli_error($koneksi));
}
?>
