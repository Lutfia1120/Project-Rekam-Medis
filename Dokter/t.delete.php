<?php
session_start();

include '../koneksi.php';

$kd_tindakan = $_GET['kd_tindakan'];
mysqli_query($koneksi, "DELETE FROM tindakan WHERE kd_tindakan='$kd_tindakan'");
header("Location: obat_data.php
");
?>