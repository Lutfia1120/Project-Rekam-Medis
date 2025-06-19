<?php
include '../koneksi.php';
session_start();


$kd_dokter   = $_POST['kd_dokter'] ?? '';
$kd_poli     = $_POST['kd_poli'] ?? '';
$kd_user     = $_POST['kd_user'] ?? '';
$nm_dokter   = $_POST['nm_dokter'] ?? '';
$SIP         = $_POST['SIP'] ?? '';
$tmpt_lahir  = $_POST['tmpt_lahir'] ?? '';
$no_telp     = $_POST['no_telp'] ?? '';
$alamat      = $_POST['alamat'] ?? '';


if (empty($kd_dokter) || empty($kd_poli) || empty($kd_user) || empty($nm_dokter)) {
    header("Location: dokter.php?error=1");
    exit;
}


$cek = mysqli_query($koneksi, "SELECT kd_dokter FROM dokter WHERE kd_dokter = '$kd_dokter'");
if (mysqli_num_rows($cek) > 0) {
    header("Location: dokter.php?error=duplikat");
    exit;
}


$sql = "INSERT INTO dokter (kd_dokter, kd_poli, kd_user, nm_dokter, SIP, tmpt_lahir, no_telp, alamat)
        VALUES ('$kd_dokter', '$kd_poli', '$kd_user', '$nm_dokter', '$SIP', '$tmpt_lahir', '$no_telp', '$alamat')";

if (mysqli_query($koneksi, $sql)) {
    header("Location: do_data.php?sukses=1");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
