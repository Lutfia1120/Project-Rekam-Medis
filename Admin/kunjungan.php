<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Admin') {
    header("Location: ../login.php");
    exit;
}
?>
<?php 
include('../koneksi.php');

$poliQuery = mysqli_query($koneksi, "SELECT kd_poli, nm_poli FROM poliklinik");
$nopQuery = mysqli_query($koneksi, "SELECT no_pasien, nm_pasien FROM pasien");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pasien</title>
  <link rel="stylesheet" href="p_style.css">
</head>
<body>
<?php include("a_header.php")?>
<?php include('k_sidebar.php')?>

  <main class="main-content">
    <section class="container">
        <header>Input Data Kunjungan</header>
        <form action="k_simpan.php" class="form" method="POST">

            <div class="input-box">
               <label for="tgl">Tanggal Kunjungan</label>
               <input type="date" name="tgl_kunjungan" id="tgl" required>
            </div>

            <div class="input-box">
                <label>Nomor Pasien</label>
                <select name="no_pasien" required>
                <option value="">-- Pilih Nomor --</option>
                <?php while ($pasien = mysqli_fetch_assoc($nopQuery)): ?>
                    <option value="<?= $pasien['no_pasien'] ?>">
                        <?= $pasien['no_pasien'] ?> - <?= $pasien['nm_pasien'] ?>
                    </option>
                <?php endwhile; ?>
                </select>
            </div>

            <div class="input-box">
                <label>Kode Poliklinik</label>
                <select name="kd_poli" required>
                <option value="">-- Pilih Poliklinik --</option>
                <?php while ($poli = mysqli_fetch_assoc($poliQuery)): ?>
                    <option value="<?= $poli['kd_poli'] ?>">
                        <?= $poli['kd_poli'] ?> - <?= $poli['nm_poli'] ?>
                    </option>
                <?php endwhile; ?>
                </select>
            </div>

            <div class="input-box"> 
                <label for="jam">Jam Kunjungan</label>
                <input type="text" name="jam_kunjungan" id="jam" placeholder="Contoh: 08:00" required>
            </div>

            <div class="button">
                <button type="submit" class="btn btn-primary">submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </form>
    </section>
  </main>
</body>
</html>
