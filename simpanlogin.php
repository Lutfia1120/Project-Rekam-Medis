
<?php
session_start();
require_once 'koneksi.php'; 

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $pilihan = $_POST['pilihan'];


    $cekusername = $koneksi->query("SELECT username FROM users WHERE username = '$username'");

    if ($cekusername->num_rows > 0) {
        $_SESSION['register_error'] = 'Username sudah ada';
        $_SESSION['active_form'] = 'register';
    } else {
        $koneksi->query("INSERT INTO users (username, pw, pilihan) VALUES ('$username', '$pw', '$pilihan')");
    }

    header("Location: loginregis.php");
    exit();
}


if (isset($_POST['login'])){
    $username = $_POST['username'];
    $pw = $_POST['pw'];

    $result = $koneksi->query("SELECT * FROM users where username = '$username'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if(password_verify($pw, $user['pw'])){
            $_SESSION['username'] = $user['username'];

            if ($user['pilihan'] === 'dokter') {
                header("Location: Dokter/hal_dokter.php");
            } else {
                header("Location: Pasien/hal_pasien.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = 'Username atau Password salah';
    $_SESSION['active_form'] = 'login';
    header("Location: loginregis.php");
    exit();

}
?>