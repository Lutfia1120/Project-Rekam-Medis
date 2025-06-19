<?php
session_start();

include '../koneksi.php';

$no_pasien = $_GET['no_pasien'];
mysqli_query($koneksi, "DELETE FROM pasien WHERE no_pasien='$no_pasien'");
header("Location: pasien_data.php
");
?>