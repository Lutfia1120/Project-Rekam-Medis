<?php
include('../koneksi.php');

$no_pasien = $_POST['no_pasien'];
$nm_pasien = $_POST['nm_pasien'];
$j_kel = $_POST['j_kel'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$usia = $_POST['usia'];
$no_telp = $_POST['no_telp'];
$nm_kk = $_POST['nm_kk'];
$hub_kel = $_POST['hub_kel'];

$sql = "UPDATE pasien SET 
            nm_pasien = '$nm_pasien',
            j_kel = '$j_kel',
            agama = '$agama',
            alamat = '$alamat',
            tgl_lahir = '$tgl_lahir',
            usia = '$usia',
            no_telp = '$no_telp',
            nm_kk = '$nm_kk',
            hub_kel = '$hub_kel'
        WHERE no_pasien = '$no_pasien'";

if (mysqli_query($koneksi, $sql)) {
    header("Location: pasien_data.php?update=sukses");
} else {
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}
?>
