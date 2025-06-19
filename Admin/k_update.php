<?php
include('../koneksi.php');
include("a_header.php");
include("k_sidebar.php");

$id_kunjungan = $_GET['id_kunjungan'] ?? null;

if (!$id_kunjungan) {
    echo "ID Kunjungan tidak ditemukan.";
    exit;
}

// Ambil data kunjungan
$sql = "SELECT * FROM kunjungan WHERE id_kunjungan = '$id_kunjungan'";
$hasil = $koneksi->query($sql);
$data = $hasil->fetch_assoc();

if (!$data) {
    echo "Data kunjungan tidak ditemukan.";
    exit;
}

// Ambil data pasien dan poliklinik
$pasienQuery = mysqli_query($koneksi, "SELECT no_pasien, nm_pasien FROM pasien");
$poliQuery = mysqli_query($koneksi, "SELECT kd_poli, nm_poli FROM poliklinik");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Data Kunjungan</title>
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
            <h2>Update Data Kunjungan</h2>
        </div>
        <form class="form-update" method="POST" action="k_update_proses.php">
            <input type="hidden" name="id_kunjungan" value="<?= $data['id_kunjungan'] ?>">

            <div class="form-group">
                <label>Tanggal Kunjungan</label>
                <input type="date" name="tgl_kunjungan" value="<?= $data['tgl_kunjungan'] ?>" required>
            </div>

            <div class="form-group">
                <label>Nomor Pasien</label>
                <select name="no_pasien" required>
                    <?php while ($pasien = mysqli_fetch_assoc($pasienQuery)): ?>
                        <option value="<?= $pasien['no_pasien'] ?>" <?= $data['no_pasien'] == $pasien['no_pasien'] ? 'selected' : '' ?>>
                            <?= $pasien['no_pasien'] ?> - <?= $pasien['nm_pasien'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Poliklinik</label>
                <select name="kd_poli" required>
                    <?php while ($poli = mysqli_fetch_assoc($poliQuery)): ?>
                        <option value="<?= $poli['kd_poli'] ?>" <?= $data['kd_poli'] == $poli['kd_poli'] ? 'selected' : '' ?>>
                            <?= $poli['kd_poli'] ?> - <?= $poli['nm_poli'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Jam Kunjungan</label>
                <input type="text" name="jam_kunjungan" value="<?= $data['jam_kunjungan'] ?>" placeholder="Contoh: 08:00" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-simpan">Simpan</button>
                <a href="k_data.php" class="btn-batal">Batal</a>
            </div>
        </form>
    </main>
</div>
</body>
</html>
