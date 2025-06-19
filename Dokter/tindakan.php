<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Dokter') {
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
<?php include('t_sidebar.php')?>

  <main class="main-content">
    <section class="container">
        <header>Input Data Tindakan</header>
        <form action="t_simpan.php" class="form" method="POST">

            <div class="input-box">
               <label for="kdtindakan">Kode Tindakan</label>
               <input type="text" name="kd_tindakan" id="kdtindakan" required>
            </div>
           <div class="input-box">
            <label>Nama Tindakan</label>
            <select name="nm_tindakan" required>
                <option value="">-- Tindakan --</option>
                <option value="Pemeriksaan FIsik">Pemeriksaan Fisik</option>
                <option value="Operasi">Operasi</option>
                <option value="Pemasangan Infus">Pemasangan Infus</option>
                <option value="Suntik Antibiotik">Suntik Antibiotik</option>
                <option value="CT Scan">CT Scan</option>
                <option value="USG">USG</option>
            </select>
            </div>
           <div class="input-box">
               <label for="ket">Keterangan Tindakan</label>
               <input type="text" name="ket" id="ket" required>
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
