<?php
session_start();

include '../koneksi.php';

$kd_dokter = $_GET['kd_dokter'];
mysqli_query($koneksi, "DELETE FROM dokter WHERE kd_dokter='$kd_dokter'");
header("Location: do_data.php
");
?>