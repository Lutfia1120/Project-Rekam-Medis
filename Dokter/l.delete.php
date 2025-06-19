<?php
session_start();

include '../koneksi.php';

$kd_lab = $_GET['kd_lab'];
mysqli_query($koneksi, "DELETE FROM laboratorium WHERE kd_lab='$kd_lab'");
header("Location: lab_data.php
");
?>