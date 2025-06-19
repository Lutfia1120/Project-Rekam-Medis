<?php
session_start();

include '../koneksi.php';

$id_kunjungan = $_GET['id_kunjungan'];
mysqli_query($koneksi, "DELETE FROM kunjungan WHERE id_kunjungan='$id_kunjungan'");
header("Location: k_data.php
");
?>