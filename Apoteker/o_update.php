<?php
include('../koneksi.php');
include("a_header.php");
include("o_sidebar.php");

$kd_obat = $_GET['kd_obat'] ?? null;

if (!$kd_obat) {
    echo "Kode Obat tidak ditemukan.";
    exit;
}

$sql = "SELECT * FROM obat WHERE kd_obat = '$kd_obat'";
$hasil = $koneksi->query($sql);
$data = $hasil->fetch_assoc();

if (!$data) {
    echo "Data Obat tidak ditemukan.";
    exit;
}
?>
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Data Obat</title>
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
            <h2>Update Data Obat</h2>
        </div>
        <form class="form-update" method="POST" action="o_update_proses.php">
            <input type="hidden" name="kd_obat_lama" value="<?= $data['kd_obat'] ?>">

            <div class="form-group">
                <label>Kode Obat</label>
                <input type="text" name="kd_obat" value="<?= $data['kd_obat'] ?>" required>
            </div>

            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="nm_obat" value="<?= $data['nm_obat'] ?>" required>
            </div>

            <div class="form-group">
                <label>Jumlah Obat</label>
                <input type="text" name="jml_obat" value="<?= $data['jml_obat'] ?>" required>
            </div>

            <div class="form-group">
                <label>Ukuran Obat</label>
                <input type="text" name="ukuran" value="<?= $data['ukuran'] ?>" required>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga"  value="<?= $data['harga'] ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-simpan">Update</button>
                <a href="obat_data.php" class="btn-batal">Batal</a>
            </div>
        </form>

    </main>
</div>
</body>
</html>
