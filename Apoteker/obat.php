<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Apoteker') {
    header("Location: ../login.php");
    exit;
}
?>
<?php include('../koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tindakam</title>
  <link rel="stylesheet" href="p_style.css">
</head>
<body>
<?php include("a_header.php")?>
<?php include('o_sidebar.php')?>

  <main class="main-content">
    <section class="container">
        <header>Input Data Obat</header>
        <form action="o_simpan.php" class="form" method="POST">
    <div class="input-box">
        <label for="kd_obat">Kode Obat</label>
        <input type="text" name="kd_obat" id="kd_obat" required>
    </div>

    <div class="input-box">
        <label for="nm_obat">Nama Obat</label>
        <select name="nm_obat" id="nm_obat" required>
            <option value="">-- Pilih Obat --</option>
            <option value="Paracetamol">Paracetamol</option>
            <option value="Amoxicillin">Amoxicillin</option>
            <option value="Infus Ringer Laktat">Infus Ringer Laktat</option>
            <option value="Antibiotik Suntik">Antibiotik Suntik</option>
            <option value="CTM">CTM</option>
            <option value="Ibuprofen">Ibuprofen</option>
        </select>
    </div>

    <div class="input-box">
        <label for="jml_obat">Jumlah Obat</label>
        <input type="text" name="jml_obat" id="jml_obat" required>
    </div>

    <div class="input-box">
        <label for="ukuran">Ukuran Obat</label>
        <input type="text" name="ukuran" id="ukuran" required>
    </div>

    <div class="input-box">
        <label for="harga">Harga Obat</label>
        <input type="text" name="harga" id="harga" required>
    </div>

    <div class="button">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </div>
</form>

    </section>
  </main>



</body>
</html>
