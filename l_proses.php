<?php
session_start();
include "koneksi.php"; 

$username = $_POST['username'];
$password = md5($_POST['password']); 
$query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if ($data) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    // Redirect berdasarkan role
    switch ($data['role']) {
        case 'Admin':
            header("Location: Admin/dashboard.php");
            break;
        case 'Dokter':
            header("Location: Dokter/dashboard.php");
            break;
        case 'Apoteker':
            header("Location: Apoteker/dashboard.php");
            break;
    }
} else {
    echo "Login gagal. <a href='login.php'>Coba lagi</a>";
}
?>
