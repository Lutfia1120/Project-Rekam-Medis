<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Dokter') {
    header("Location: ../login.php");
    exit;
}

include('../koneksi.php');

$no_RM      = $_POST['no_RM'];
$kd_tindakan= $_POST['kd_tindakan'];
$kd_obat    = $_POST['kd_obat'];
$kd_user    = $_POST['kd_user'];
$no_pasien  = $_POST['no_pasien'];
$diagnosa   = $_POST['diagnosa'];
$resep      = $_POST['resep'];
$keluhan    = $_POST['keluhan'];
$tgl_periksa= $_POST['tgl_periksa'];
$ket= $_POST['ket'];


$sql = "INSERT INTO rekam_medis
        (no_RM, kd_tindakan, kd_obat, kd_user, no_pasien, diagnosa, resep, keluhan, tgl_periksa, ket)
        VALUES
        ('$no_RM', '$kd_tindakan', '$kd_obat', '$kd_user', '$no_pasien', '$diagnosa', '$resep', '$keluhan', '$tgl_periksa', '$ket')";

if (mysqli_query($koneksi, $sql)) {
    header("Location: rm_data.php?sukses=tambah");
    exit;
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
