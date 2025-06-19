<?php
include('../koneksi.php');
include("a_header.php");
include("do_sidebar.php");

$kd_dokter = $_GET['kd_dokter'] ?? null;

if (!$kd_dokter) {
    echo "Kode Dokter tidak ditemukan.";
    exit;
}

// Ambil data dokter
$sql = "SELECT * FROM dokter WHERE kd_dokter = '$kd_dokter'";
$hasil = $koneksi->query($sql);
$data = $hasil->fetch_assoc();

if (!$data) {
    echo "Data dokter tidak ditemukan.";
    exit;
}

// Ambil data poli dan user
$poliQuery = mysqli_query($koneksi, "SELECT kd_poli, nm_poli FROM poliklinik");
$userQuery = mysqli_query($koneksi, "SELECT kd_user, username FROM login WHERE role='Dokter'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Data Dokter</title>
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
            background: #fff; 
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
            flex-direction: 
            column; gap: 15px; 
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
        .form-group input, 
        .form-group select { 
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
        .form-actions button, 
        .form-actions a { 
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
            <h2>Update Data Dokter</h2>
        </div>
        <form class="form-update" method="POST" action="do_update_proses.php">
            <input type="hidden" name="kd_dokter" value="<?= $data['kd_dokter'] ?>">

            <div class="form-group">
                <label>Nama Dokter</label>
                <input type="text" name="nm_dokter" value="<?= $data['nm_dokter'] ?>" required>
            </div>

            <div class="form-group">
                <label>SIP</label>
                <input type="text" name="SIP" value="<?= $data['SIP'] ?>" required>
            </div>

            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tmpt_lahir" value="<?= $data['tmpt_lahir'] ?>" required>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="no_telp" value="<?= $data['no_telp'] ?>" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?= $data['alamat'] ?>" required>
            </div>

            <div class="form-group">
                <label>Kode Poli</label>
                <select name="kd_poli" required>
                    <?php while ($poli = mysqli_fetch_assoc($poliQuery)): ?>
                        <option value="<?= $poli['kd_poli'] ?>" <?= $poli['kd_poli'] == $data['kd_poli'] ? 'selected' : '' ?>>
                            <?= $poli['kd_poli'] ?> - <?= $poli['nm_poli'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Kode User</label>
                <select name="kd_user" required>
                    <?php while ($user = mysqli_fetch_assoc($userQuery)): ?>
                        <option value="<?= $user['kd_user'] ?>" <?= $user['kd_user'] == $data['kd_user'] ? 'selected' : '' ?>>
                            <?= $user['kd_user'] ?> - <?= $user['username'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-simpan">Simpan</button>
                <a href="do_data.php" class="btn-batal">Batal</a>
            </div>
        </form>
    </main>
</div>
</body>
</html>
