<?php
include('../koneksi.php');
include("a_header.php");
include("p_sidebar.php");

$no_pasien = $_GET['no_pasien'] ?? null;

if (!$no_pasien) {
    echo "Nomor Pasien tidak ditemukan.";
    exit;
}

$sql = "SELECT * FROM pasien WHERE no_pasien = '$no_pasien'";
$hasil = $koneksi->query($sql);
$data = $hasil->fetch_assoc();

if (!$data) {
    echo "Data pasien tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Data Pasien</title>
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
            <h2>Update Data Pasien</h2>
        </div>
        <form class="form-update" method="POST" action="p_update_proses.php">
            <input type="hidden" name="no_pasien" value="<?= $data['no_pasien'] ?>">

            <div class="form-group">
                <label>Nama Pasien</label>
                <input type="text" name="nm_pasien" value="<?= $data['nm_pasien'] ?>" required>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="j_kel" required>
                    <option value="Perempuan" <?= $data['j_kel'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                    <option value="Laki-laki" <?= $data['j_kel'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                </select>
            </div>

            <div class="form-group">
                <label>Agama</label>
                <select name="agama" required>
                    <?php
                    $agama_list = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
                    foreach ($agama_list as $agama) {
                        $selected = $data['agama'] == $agama ? 'selected' : '';
                        echo "<option value='$agama' $selected>$agama</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?= $data['alamat'] ?>" required>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" required>
            </div>

            <div class="form-group">
                <label>Usia</label>
                <input type="number" name="usia" value="<?= $data['usia'] ?>" required>
            </div>

            <div class="form-group">
                <label>Nomor Telpon</label>
                <input type="text" name="no_telp" value="<?= $data['no_telp'] ?>" required>
            </div>

            <div class="form-group">
                <label>Nama Kepala Keluarga</label>
                <input type="text" name="nm_kk" value="<?= $data['nm_kk'] ?>" required>
            </div>

            <div class="form-group">
                <label>Hubungan Keluarga</label>
                <select name="hub_kel" required>
                    <?php
                    $hub_list = ['Ayah', 'Ibu', 'Anak', 'Suami', 'Istri', 'Wali', 'Lainnya'];
                    foreach ($hub_list as $hub) {
                        $selected = $data['hub_kel'] == $hub ? 'selected' : '';
                        echo "<option value='$hub' $selected>$hub</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-simpan">Simpan</button>
                <a href="pasien_data.php" class="btn-batal">Batal</a>
            </div>
        </form>
    </main>
</div>
</body>
</html>
