<?php
include('../koneksi.php');
include("a_header.php");
include("t_sidebar.php");

$kd_tindakan = $_GET['kd_tindakan'] ?? null;

if (!$kd_tindakan) {
    echo "Kode Tindakan tidak ditemukan.";
    exit;
}

$sql = "SELECT * FROM tindakan WHERE kd_tindakan = '$kd_tindakan'";
$hasil = $koneksi->query($sql);
$data = $hasil->fetch_assoc();

if (!$data) {
    echo "Data Tindakan tidak ditemukan.";
    exit;
}
?>
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
            <h2>Update Data Tindakan</h2>
        </div>
        <form class="form-update" method="POST" action="t_update_proses.php">
            <input type="hidden" name="kd_tindakan_lama" value="<?= $data['kd_tindakan'] ?>">

            <div class="form-group">
                <label>Kode Tindakan</label>
                <input type="text" name="kd_tindakan" value="<?= $data['kd_tindakan'] ?>" required>
            </div>

            <div class="form-group">
                <label>Nama Tindakan</label>
                <input type="text" name="nm_tindakan" value="<?= $data['nm_tindakan'] ?>" required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket"  value="<?= $data['ket'] ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-simpan">Simpan</button>
                <a href="t_data.php" class="btn-batal">Batal</a>
            </div>
        </form>

    </main>
</div>
</body>
</html>
