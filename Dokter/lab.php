<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Dokter') {
    header("Location: ../login.php");
    exit;
}
?>
<?php include('../koneksi.php');

$nopQuery = mysqli_query($koneksi, "SELECT no_RM FROM rekam_medis");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Laboratorium</title>
  <link rel="stylesheet" href="p_style.css">
</head>
<body>
<?php include("a_header.php")?>
<?php include('l_sidebar.php')?>

  <main class="main-content">
    <section class="container">
        <header>Input Data Laboratorium</header>
        <form action="l_simpan.php" class="form" method="POST">

            <div class="input-box">
               <label for="kdlab">Kode Laboratorium</label>
               <input type="text" name="kd_lab" id="kdlab" required>
            </div>
            <div class="input-box">
                <label>Nomor Rekam Medis</label>
                <select name="no_RM" required>
                <option value="">-- Pilih Nomor --</option>
                <?php while ($no_RM = mysqli_fetch_assoc($nopQuery)): ?>
                    <option value="<?= $no_RM['no_RM'] ?>">
                    <?= $no_RM['no_RM'] ?> - <?= $no_RM['no_RM'] ?>
                    </option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="input-box"> 
                <label for="lantai">Hasil Laboratorium</label>
                <input type="text" name="hasil_lab" id="lantai" min="1" required>

            </div>
            <div class="input-box"> 
                <label for="lantai">Keterangan</label>
                <input type="text" name="ket" required>
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
