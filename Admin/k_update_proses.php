<?php
include('../koneksi.php');

$id = $_POST['id_kunjungan'];
$tgl = $_POST['tgl_kunjungan'];
$pasien = $_POST['no_pasien'];
$poli = $_POST['kd_poli'];
$jam = $_POST['jam_kunjungan'];

$sql = "UPDATE kunjungan SET 
        tgl_kunjungan = '$tgl',
        no_pasien = '$pasien',
        kd_poli = '$poli',
        jam_kunjungan = '$jam'
        WHERE id_kunjungan = '$id'";

if (mysqli_query($koneksi, $sql)) {
    header("Location: k_data.php?sukses=update");
} else {
    echo "Gagal memperbarui data: " . mysqli_error($koneksi);
}
?>
