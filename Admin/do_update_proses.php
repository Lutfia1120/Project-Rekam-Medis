<?php
include('../koneksi.php');

// Ambil data dari form
$kd_dokter = $_POST['kd_dokter'];
$nm_dokter = $_POST['nm_dokter'];
$SIP = $_POST['SIP'];
$tmpt_lahir = $_POST['tmpt_lahir'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$kd_poli = $_POST['kd_poli'];
$kd_user = $_POST['kd_user'];

// Update data ke database
$sql = "UPDATE dokter SET 
          nm_dokter = '$nm_dokter',
          SIP = '$SIP',
          tmpt_lahir = '$tmpt_lahir',
          no_telp = '$no_telp',
          alamat = '$alamat',
          kd_poli = '$kd_poli',
          kd_user = '$kd_user'
        WHERE kd_dokter = '$kd_dokter'";

if (mysqli_query($koneksi, $sql)) {
    header("Location: do_data.php?sukses=update");
} else {
    echo "Gagal update data: " . mysqli_error($koneksi);
}
?>
