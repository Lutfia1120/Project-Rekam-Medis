<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Apoteker') {
    header("Location: ../login.php");
    exit;
}
?>
<h2>Selamat datang, Admin!</h2>

<?php include('a_header.php')?>
