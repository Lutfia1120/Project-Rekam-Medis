<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Dokter') {
    header("Location: ../login.php");
    exit;
}
include('../koneksi.php');

// Ambil data dari masing-masing tabel
$tindakanData = mysqli_query($koneksi, "SELECT kd_tindakan, nm_tindakan FROM tindakan");
$obatData     = mysqli_query($koneksi, "SELECT kd_obat, nm_obat FROM obat");
$userData     = mysqli_query($koneksi, "SELECT kd_user, username FROM login WHERE role = 'Dokter'");
$pasienData   = mysqli_query($koneksi, "SELECT no_pasien, nm_pasien FROM pasien");

// Auto-generate no_RM (misal pakai angka terbesar + 1)
$autoRM = "RM001";
$cekRM = mysqli_query($koneksi, "SELECT MAX(no_RM) AS maxRM FROM rekam_medis");
if ($row = mysqli_fetch_assoc($cekRM)) {
    $max = $row['maxRM'];
    $urutan = (int)substr($max, 2) + 1;
    $autoRM = "RM" . str_pad($urutan, 3, '0', STR_PAD_LEFT);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tindakan</title>
  <link rel="stylesheet" href="p_style.css">
</head>
<body>
<?php include("a_header.php")?>
<?php include('rm_sidebar.php')?>

<main class="main-content">
  <section class="container">
    <header>Input Data Rekam Medis</header>
    <form action="rm_simpan.php" method="POST" class="form">
      <div class="input-box">
        <label for="norm">Nomor Rekam Medis</label>
        <input type="text" name="no_RM" id="norm" value="<?= $autoRM ?>" readonly>
      </div>

      <div class="input-box">
        <label for="kd_tindakan">Nama Tindakan</label>
        <select name="kd_tindakan" required>
          <option value="">-- Pilih Tindakan --</option>
          <?php while ($row = mysqli_fetch_assoc($tindakanData)): ?>
            <option value="<?= $row['kd_tindakan'] ?>"><?= $row['kd_tindakan'] ?> - <?= $row['nm_tindakan'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="input-box">
        <label for="kd_obat">Nama Obat</label>
        <select name="kd_obat" required>
          <option value="">-- Pilih Obat --</option>
          <?php while ($row = mysqli_fetch_assoc($obatData)): ?>
            <option value="<?= $row['kd_obat'] ?>"><?= $row['kd_obat'] ?> - <?= $row['nm_obat'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="input-box">
        <label for="kd_user">Username</label>
        <select name="kd_user" required>
          <option value="">-- Pilih Username --</option>
          <?php while ($row = mysqli_fetch_assoc($userData)): ?>
            <option value="<?= $row['kd_user'] ?>"><?= $row['kd_user'] ?> - <?= $row['username'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="input-box">
        <label for="no_pasien">Nama Pasien</label>
        <select name="no_pasien" required>
          <option value="">-- Pilih Pasien --</option>
          <?php while ($row = mysqli_fetch_assoc($pasienData)): ?>
            <option value="<?= $row['no_pasien'] ?>"><?= $row['no_pasien'] ?> - <?= $row['nm_pasien'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="input-box">
        <label for="keluhan">Keluhan</label>
        <input type="text" name="keluhan" id="keluhan" required>
      </div>

      <div class="input-box">
        <label for="diagnosa">Diagnosa</label>
        <input type="text" name="diagnosa" id="diagnosa" required>
      </div>

      <div class="input-box">
        <label for="resep">Resep</label>
        <input type="text" name="resep" id="resep" required>
      </div>

      <div class="input-box">
        <label for="tgl_periksa">Tanggal Pemeriksaan</label>
        <input type="date" name="tgl_periksa" id="tgl_periksa" required>
      </div>

      <div class="input-box">
        <label for="ket">Keterangan</label>
        <input type="text" name="ket" id="ket" required>
      </div>

      <div class="button">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
    </form>
  </section>
</main>
</body>
</html>
