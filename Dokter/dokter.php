<?php include("../headerdokter.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Utama Dokter</title>
  <link rel="stylesheet" href="style_from.css">
</head>
<body>

  <main class="main-content">
    <section class="container">
        <header>Input Profil</header>
        <form action="" class="form" method="POST">
            <div class="input-box">
                <label>Nama Dokter</label>
                <input type="text" name="nm_dokter" placeholder="Masukkan nama lengkap">
            </div>
            <div class="input-box">
                <label>SIP</label>
                <input type="text" name="SIP" placeholder="Masukkan nomor SIP">
            </div>
            <div class="input-box">
                <label>Tempat Lahir</label>
                <input type="text" name="tmpt_lahir" placeholder="Masukkan tempat lahir">
            </div>
        </form>
    </section>
  </main>

  <?php include("../footerdokter.php"); ?>

</body>
</html>
