<?php
session_start();

include '../koneksi.php';

$no_RM = $_GET['no_RM'];
mysqli_query($koneksi, "DELETE FROM rekam_medis WHERE no_RM='$no_RM'");
header("Location: rm_data.php
");
?>