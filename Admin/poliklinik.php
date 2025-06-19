<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Admin') {
    header("Location: ../login.php");
    exit;
}
?>
<?php include('../koneksi.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Poliklinik</title>
  <link rel="stylesheet" href="p_style.css">
</head>
<body>
<?php include("a_header.php")?>
<?php include('po_sidebar.php')?>

  <main class="main-content">
    <section class="container">
        <header>Input Data Poliklinik</header>
        <form action="po_simpan.php" class="form" method="POST">

            <div class="input-box">
               <label for="nm_poli">Kode Poliklinik</label>
               <input type="text" name="kd_poli" id="lantai" required>
            </div>
            <div class="input-box">
               <label for="nm_poli">Nama Poliklinik</label>
               <input type="text" name="nm_poli" id="lantai" required>
            </div>
            <div class="input-box"> 
                <label for="lantai">Lantai</label>
                <input type="number" name="lantai" id="lantai" min="1" required>

            </div>
            <div class="input-box"> 
                <label for="lantai">Keterangan</label>
                <input type="text" name="ket" required>
            </div>
            <div class="button">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </div>
        </form>
    </section>
  </main>



</body>
</html>
