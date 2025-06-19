<?php
session_start();

include '../koneksi.php';

$kd_poli = $_GET['kd_poli'];
mysqli_query($koneksi, "DELETE FROM poliklinik WHERE kd_poli='$kd_poli'");
header("Location: poli_data.php
");
?>