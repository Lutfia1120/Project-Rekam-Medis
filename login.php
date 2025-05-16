<?php
session_start();
if (isset($_SESSION['admin_username'])) {
  header("location:admin_utama.php");
}
include ("connection.php");
$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username == '' or $password == ''){
       $err .="<li>Silahkan masukkan username dan password</li>";
  }
  if (empty($err)) {
    $sql1 = "select * from users where username = '$username'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    if ($r1['password'] != md5($password)) {
        $err .="<li>Akun tidak ditemukan</li>";
    }
    
    if (empty($err)) {
      $login_id = $r1['login_id'];
      $sql1 = "select * from admin_akses where login_id = 'login_id'";
      $q1 = mysqli_query($koneksi, $sql1);
      while ($r1 = mysqli_fetch_array($q1)) {
        $akses[] = $r1['akses_id']; //dokter, pasien
      }
  }
  if (empty($akses)) {
    $err .= "<li>Kamu tidak punya akses ke halaman admin</li>";
  }
  if (empty($err)) {
    $_SESSION['users_username'] = $username;
    $_SESSION['admin_akses'] = $akses;
    header("location:admin_utama.php");
    exit();
  }
  
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    #box{
    width: 700px;
    margin: auto;
    padding: 13px;
    border-radius: 10px;
    background-color: brown;
    
}
h1 {
  color: white;
}
.form-control {
 padding: 10px;
 width: 300px;
 border-radius: 5px;
}
.tombol {
padding : 10px;
width : 100px;
border-radius: 5px;
}

    </style>
</head>
<body>
  <div id="box">
    <form action = "" method = "post">
      <h1>Login</h1>
      <?php
      if ($err) {
        echo "<ul>$err</ul>";
      }
      ?>
                  <input type="text" class="form-control" value="<?php echo $username?>" name = "username" placeholder="Username"/><br>      
                  <input type="password" class="form-control"  name = "password" placeholder="Password"/> <br><br>
                  <input type = "submit" class = "tombol" name = "login" value = "login"/>       
    </form>
    </div>  
</body>
</html>