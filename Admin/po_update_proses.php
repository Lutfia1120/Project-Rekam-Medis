<?php
include('../koneksi.php');

$kd_poli = $_POST['kd_poli'];
$nm_poli = $_POST['nm_poli'];
$lantai = $_POST['lantai'];
$ket = $_POST['ket'];

$sql = "UPDATE poliklinik SET 
            kd_poli = '$kd_poli',
            nm_poli = '$nm_poli',
            lantai = '$lantai',
            ket = '$ket'
        WHERE kd_poli = '$kd_poli'";

if (mysqli_query($koneksi, $sql)) {
    header("Location: poli_data.php?update=sukses");
} else {
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}
?>
