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
  <title>Form Pasien</title>
  <link rel="stylesheet" href="p_style.css">
</head>
<body>
<?php include("a_header.php")?>
<?php include('p_sidebar.php')?>

  <main class="main-content">
    <section class="container">
        <header>Input Data Pasien</header>
        <form action="p_simpan.php" class="form" method="POST">

            <?php if (isset($_GET['error']) && $_GET['error'] == 'duplikat'): ?>
              <div class="alert alert-warning">Data dengan Nomor Pasien tersebut sudah ada!</div>
            <?php endif; ?>

            <div class="input-box">
                <label>Nomor Pasien</label>
                <input type="text" name="no_pasien" placeholder="Masukkan Nomor Pasien" required>
            </div>
            <div class="input-box">
                <label>Nama Pasien</label>
                <input type="text" name="nm_pasien" placeholder="Masukkan Nama Lengkap" required>
            </div>
            <div class="input-box">
                <label>Jenis Kelamin</label>
                <label><input type="radio" name="j_kel" value="Perempuan"> Perempuan</label>
                <label><input type="radio" name="j_kel" value="Laki-laki"> Laki-laki</label>
            </div>
            <div class="input-box">
            <label>Agama</label>
            <select name="agama" required>
                <option value="">-- Pilih Agama --</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
            </div>
            <div class="input-box">
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Masukkan Alamat" required>
            </div>
            <div class="input-box">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" required>
            </div>
            <div class="input-box">
                <label>Usia</label>
                <input type="text" name="usia" placeholder="Masukkan Usia" required>
            </div>
            <div class="input-box">
                <label>Nomor Telpon</label>
                <input type="text" name="no_telp" placeholder="Masukkan Nomor Telpon Pasien" required>
            </div>
            <div class="input-box">
                <label>Nama Kepala Keluarga</label>
                <input type="text" name="nm_kk" placeholder="Masukkan Nama Lengkap KK" required>
            </div>
            <div class="input-box">
            <label>Hubungan Keluarga</label>
            <select name="hub_kel" required>
                <option value="">-- Pilih Hubungan --</option>
                <option value="Ayah">Ayah</option>
                <option value="Ibu">Ibu</option>
                <option value="Anak">Anak</option>
                <option value="Suami">Suami</option>
                <option value="Istri">Istri</option>
                <option value="Wali">Wali</option>
                <option value="Lainnya">Lainnya</option>
            </select>
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
