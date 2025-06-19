<?php
include('../koneksi.php');

$no_RM = $_POST['no_RM'];
$kd_tindakan = $_POST['kd_tindakan'];
$kd_obat = $_POST['kd_obat'];
$kd_user = $_POST['kd_user'];
$no_pasien = $_POST['no_pasien'];
$diagnosa = $_POST['diagnosa'];
$keluhan = $_POST['keluhan'];
$resep = $_POST['resep'];
$tgl_periksa = $_POST['tgl_periksa'];
$ket = $_POST['ket'];

$sql = "UPDATE rekam_medis SET 
            kd_tindakan = '$kd_tindakan',
            kd_obat = '$kd_obat',
            kd_user = '$kd_user',
            no_pasien = '$no_pasien',
            diagnosa = '$diagnosa',
            keluhan = '$keluhan',
            resep = '$resep',
            tgl_periksa = '$tgl_periksa',
            ket = '$ket'
        WHERE no_RM = '$no_RM'";

if (mysqli_query($koneksi, $sql)) {
    header("Location: rm_data.php?update=sukses");
} else {
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}
?>
