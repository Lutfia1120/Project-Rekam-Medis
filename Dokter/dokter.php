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
                <input type="text" name="nm" placeholder="Nama lengkap">
            </div>
            <div class="input-box">
                <label>Nama</label>
                <input type="text" name="nm" placeholder="Nama">
            </div>
        </form>
    </section>
  </main>

  <?php include("../footerdokter.php"); ?>

</body>
</html>
