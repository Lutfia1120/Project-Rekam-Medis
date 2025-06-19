<?php
include('../koneksi.php');

$kd_obat_lama = $_POST['kd_obat_lama']; 
$kd_obat = $_POST['kd_obat'];
$nm_obat = $_POST['nm_obat'];
$jml_obat = $_POST['jml_obat'];
$ukuran = $_POST['ukuran'];
$harga = $_POST['harga'];

$sql = "UPDATE obat SET 
            kd_obat = '$kd_obat',
            nm_obat = '$nm_obat',
            jml_obat = '$jml_obat',
            ukuran = '$ukuran',
            harga = '$harga'
        WHERE kd_obat = '$kd_obat_lama'";

if (mysqli_query($koneksi, $sql)) {
    header("Location: obat_data.php?sukses=update");
} else {
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}
?>
