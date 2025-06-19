<?php
 session_start();

 $errors =[
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? '',
 ];
 $activeForm = $_SESSION['active_form'] ?? 'login';

 session_unset();

 function showError($error) {
    return !empty($error) ? "<p class='pesan-eror'>$error</p>" : '';
 }

 function isActiveForm($forName, $activeForm) {
    return $forName === $activeForm ? 'active' : '';
}

?>
<!DOCTYPE html>
<html lang="en">                                                    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_Register</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
    <div class="container">
       <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="form-login">
        <form action = "simpanlogin.php" method = "POST">
            <h2>Login</h2>
            <?= showError($errors['login']); ?>
            <input type = "text" name = "username" placeholder="Username" required> 
            <input type = "password" name = "pw" placeholder="Password" required> 
            <button type = "submit" name = "login">Login</button>
            <p>Belum mempunyai akun? <a href = "#" onclick="showForm('form-regis')"> Register</a> </p>
        </form>
       </div>
       <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="form-regis">
        <form action = "simpanlogin.php" method = "POST" >
            <h2>Register</h2>
            <?= showError($errors['register']); ?>
            <input type = "text" name = "username" placeholder="Username" required> 
            <input type = "password" name = "pw" placeholder="Password" required> 
            <select name = "pilihan" required>
               <option value="">-Pilihan-</option>
               <option value="">Dokter</option>
               <option value="">Pasien</option>
            </select>
            <button type = "submit" name = "register">Register</button>
            <p>Sudah mempunyai akun? <a href = "" oncli ck="showForm('form-login')"> Login</a> </p>
        </form>
       </div>
    </div>
    <script src ="script.js"></script>
</body>
</html>