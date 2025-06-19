<?php
include('../koneksi.php');
include("a_header.php");
include("p_sidebar.php");

$no_pasien = $_GET['no_pasien'] ?? null;

if (!$no_pasien) {
    echo "Nomor Pasien tidak ditemukan.";
    exit;
}

// Ambil data rekam medis berdasarkan no_pasien
$sql = "SELECT * FROM pasien WHERE no_pasien = '$no_pasien'";
$hasil = $koneksi->query($sql);
$data = $hasil->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Rekam Medis</title>
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

        .form-display {
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

        .form-group input {
            padding: 8px;
            border: 1px solid #ccc;
            background-color: #e9ecef;
            border-radius: 4px;
            color: #333;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-actions a {
            width: 48%;
            text-align: center;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-update {
            background-color: #007bff;
            color: white;
        }

        .btn-update:hover {
            background-color: #0056b3;
        }

        .btn-kembali {
            background-color: #6c757d;
            color: white;
        }

        .btn-kembali:hover {
            background-color: #444;
        }

    </style> 
</head>
<body>
<div class="content-wrapper">
    <main class="main-content">
        <div class="header">
            <h2>Data Rekam Medis Pasien</h2>
        </div>
        <form class="form-display" readonly>
            <div class="form-group">
                <label>Nomor Pasien</label>
                <input type="text" value="<?= $data['no_pasien'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama Pasien</label>
                <input type="text" value="<?= $data['nm_pasien'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" value="<?= $data['j_kel'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Agama</label>
                <input type="text" value="<?= $data['agama'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" value="<?= $data['alamat'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="text" value="<?= $data['tgl_lahir'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Usia</label>
                <input type="text" value="<?= $data['usia'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nomor Telpon</label>
                <input type="text" value="<?= $data['no_telp'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama Kepala Keluarga</label>
                <input type="text" value="<?= $data['nm_kk'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Hubungan Keluarga</label>
                <input type="text" value="<?= $data['hub_kel'] ?>" readonly>
            </div>
            <div class="form-actions">
                <a href="p_update.php?no_pasien=<?= $data['no_pasien'] ?>" class="btn-update">Update</a>
                <a href="pasien_data.php" class="btn-kembali">Kembali</a>
            </div>

        </form>
    </main>
</div>
</body>
</html>
