<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Admin') {
    header("Location: ../login.php");
    exit;
}
?>
<?php include('../koneksi.php')?>
<?php
// Ambil data user (misal hanya role dokter)
$userQuery = mysqli_query($koneksi, "SELECT kd_user, username FROM login WHERE role='Dokter'");

// Ambil data poliklinik
$poliQuery = mysqli_query($koneksi, "SELECT kd_poli, nm_poli FROM poliklinik");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form DOkter</title>
  <link rel="stylesheet" href="p_style.css">
</head>
<body>
<?php include("a_header.php")?>
<?php include('do_sidebar.php')?>

  <main class="main-content">
    <section class="container">
        <header>Input Data Dokter</header>
       <form action="do_simpan.php" class="form" method="POST">
            <div class="input-box">
                <label>Kode Dokter</label>
                <input type="text" name="kd_dokter" placeholder="Masukkan Kode Dokter" required>
            </div>

            <div class="input-box">
                <label>Poliklinik</label>
                <select name="kd_poli" required>
                <option value="">-- Pilih Poliklinik --</option>
                <?php while ($poli = mysqli_fetch_assoc($poliQuery)): ?>
                    <option value="<?= $poli['kd_poli'] ?>"><?= $poli['nm_poli'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="input-box">
                            <label>Tanggal Kunjungan</label>
                            <input type="date" name="nm_dokter" placeholder="Masukkan Nama Dokter" required>
            </div>
            <div class="input-box">
                <label>Kode User (Login Dokter)</label>
                <select name="kd_user" required>
                <option value="">-- Pilih User --</option>
                <?php while ($user = mysqli_fetch_assoc($userQuery)): ?>
                    <option value="<?= $user['kd_user'] ?>"><?= $user['kd_user'] ?></option>
                <?php endwhile; ?>
                </select>
            </div>

            <div class="input-box">
                <label>Nama Dokter</label>
                <input type="text" name="nm_dokter" placeholder="Masukkan Nama Dokter" required>
            </div>

            <div class="input-box">
                <label>SIP</label>
                <input type="text" name="SIP" placeholder="Masukkan Nomor SIP" required>
            </div>

            <div class="input-box">
                <label>Tempat Lahir</label>
                <input type="text" name="tmpt_lahir" placeholder="Masukkan Tempat Lahir" required>
            </div>

            <div class="input-box">
                <label>Nomor Telepon</label>
                <input type="text" name="no_telp" placeholder="Masukkan Nomor Telepon" required>
            </div>

            <div class="input-box">
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Masukkan Alamat Dokter" required>
            </div>

            <div class="button">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>

        </form>

    </section>
  </main>



</body>
</html>
