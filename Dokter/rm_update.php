<?php
include('../koneksi.php');
include("a_header.php");
include("rm_sidebar.php");

$no_RM = $_GET['no_RM'];
$query = mysqli_query($koneksi, "SELECT * FROM rekam_medis WHERE no_RM = '$no_RM'");
$data  = mysqli_fetch_assoc($query);

// Ambil data untuk dropdown
$tindakan = mysqli_query($koneksi, "SELECT kd_tindakan, nm_tindakan FROM tindakan");
$obat     = mysqli_query($koneksi, "SELECT kd_obat, nm_obat FROM obat");
$login    = mysqli_query($koneksi, "SELECT kd_user, username FROM login WHERE role = 'Dokter'");
$pasien   = mysqli_query($koneksi, "SELECT no_pasien, nm_pasien FROM pasien");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Data Tindakan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
        }

        .content-wrapper {
            display: flex;
            justify-content: center;
            padding-top: 140px;
        }

        .main-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            width: 600px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #222;
        }

        .form-update {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #444;
        }

        .form-group input, .form-group select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: #333;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-actions button, .form-actions a {
            width: 48%;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            color: white;
            border: none;
        }

        .btn-simpan {
            background-color: #007bff;
        }

        .btn-simpan:hover {
            background-color: #0056b3;
        }

        .btn-batal {
            background-color: #6c757d;
        }

        .btn-batal:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <main class="main-content">
        <div class="header">
            <h2>Update Data Rekam Medis</h2>
        </div>
        <form class="form-update" method="POST" action="rm_update_proses.php">
            <input type="hidden" name="no_RM_lama" value="<?= $data['no_RM'] ?>">

            <div class="form-group">
                <label>Nomor Rekam Medis</label>
                <input type="text" name="no_RM" value="<?= $data['no_RM'] ?>" readonly>
            </div>

            <div class="form-group">
            <label>Nama Tindakan</label>
            <select name="kd_tindakan" class="form-select" required>
                <option value="">-- Pilih Tindakan --</option>
                <?php while ($row = mysqli_fetch_assoc($tindakan)) { ?>
                    <option value="<?= $row['kd_tindakan'] ?>" <?= ($row['kd_tindakan'] == $data['kd_tindakan']) ? 'selected' : '' ?>>
                        <?= $row['kd_tindakan'] ?> - <?= $row['nm_tindakan'] ?>
                    </option>
                <?php } ?>
            </select>
            </div>

            
            <div class="form-group">
            <label>Nama Obat</label>
            <select name="kd_obat" class="form-select" required>
                <option value="">-- Pilih Obat --</option>
                <?php while ($row = mysqli_fetch_assoc($obat)) { ?>
                    <option value="<?= $row['kd_obat'] ?>" <?= ($row['kd_obat'] == $data['kd_obat']) ? 'selected' : '' ?>>
                        <?= $row['kd_obat'] ?> - <?= $row['nm_obat'] ?>
                    </option>
                <?php } ?>
            </select>
            </div>
             
            <div class="form-group">
            <label>Username</label>
            <select name="kd_user" class="form-select" required>
                <option value="">-- Pilih Dokter --</option>
                <?php while ($row = mysqli_fetch_assoc($login)) { ?>
                    <option value="<?= $row['kd_user'] ?>" <?= ($row['kd_user'] == $data['kd_user']) ? 'selected' : '' ?>>
                        <?= $row['kd_user'] ?> - <?= $row['username'] ?>
                    </option>
                <?php } ?>
            </select>
            </div>

            <div class="form-group">
            <label>Nama Pasien</label>
            <select name="no_pasien" class="form-select" required>
                <option value="">-- Pilih Pasien --</option>
                <?php while ($row = mysqli_fetch_assoc($pasien)) { ?>
                    <option value="<?= $row['no_pasien'] ?>" <?= ($row['no_pasien'] == $data['no_pasien']) ? 'selected' : '' ?>>
                        <?= $row['no_pasien'] ?> - <?= $row['nm_pasien'] ?>
                    </option>
                <?php } ?>
            </select>
            </div>

             <div class="form-group">
                <label>Keluhan</label>
                <input type="text" name="keluhan"  value="<?= $data['keluhan'] ?>" required>
            </div>

            <div class="form-group">
                <label>Diagnosa</label>
                <input type="text" name="diagnosa" value="<?= $data['diagnosa'] ?>" required>
            </div>

            <div class="form-group">
                <label>Resep</label>
                <input type="text" name="resep" value="<?= $data['resep'] ?>" required>
            </div>

            <div class="form-group">
                <label>Tanggal Pemeriksaan</label>
                <input type="date" name="tgl_periksa"  value="<?= $data['tgl_periksa'] ?>" required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket"  value="<?= $data['ket'] ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-simpan">Simpan</button>
                <a href="rm_data.php" class="btn-batal">Batal</a>
            </div>
        </form>

    </main>
</div>
</body>
</html>

