<?php
include('../koneksi.php');

$kd_tindakan_lama = $_POST['kd_tindakan_lama']; 
$kd_tindakan = $_POST['kd_tindakan'];
$nm_tindakan = $_POST['nm_tindakan'];
$ket = $_POST['ket'];

$sql = "UPDATE tindakan SET 
            kd_tindakan = '$kd_tindakan',
            nm_tindakan = '$nm_tindakan',
            ket = '$ket'
        WHERE kd_tindakan = '$kd_tindakan_lama'";

if (mysqli_query($koneksi, $sql)) {
    header("Location: t_data.php?sukses=update");
} else {
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}
?>
