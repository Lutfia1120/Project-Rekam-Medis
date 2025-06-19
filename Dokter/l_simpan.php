<?php
include '../koneksi.php';
session_start();

$kd_lab = $_POST['kd_lab'] ?? '';
$no_RM = $_POST['no_RM'] ?? '';
$hasil_lab = $_POST['hasil_lab'] ?? '';
$ket = $_POST['ket'] ?? '';

// Validasi input
if (empty($kd_lab) || empty($no_RM) || empty($hasil_lab) || empty($ket)) {
    header("Location: lab.php?error=1");
    exit;
}


$sql = "INSERT INTO laboratorium (kd_lab, no_RM, hasil_lab, ket)
        VALUES ('$kd_lab', '$no_RM', '$hasil_lab', '$ket')";

if (mysqli_query($koneksi, $sql)) {
    header("Location: lab_data.php?sukses=1");
} else {
    die("Gagal menyimpan data: " . mysqli_error($koneksi));
}
?>
