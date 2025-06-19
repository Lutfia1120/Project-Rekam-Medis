<?php 
include '../koneksi.php';

$filterPoli = $_GET['kd_poli'] ?? '';
$where = $filterPoli ? "WHERE kunjungan.kd_poli = '$filterPoli'" : "";

$query = mysqli_query($koneksi, "
    SELECT 
        kunjungan.id_kunjungan,
        kunjungan.tgl_kunjungan,
        kunjungan.jam_kunjungan,
        pasien.no_pasien,
        pasien.nm_pasien,
        poliklinik.kd_poli,
        poliklinik.nm_poli
    FROM 
        kunjungan
    JOIN pasien ON kunjungan.no_pasien = pasien.no_pasien
    JOIN poliklinik ON kunjungan.kd_poli = poliklinik.kd_poli
    $where
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kunjungan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding-top: 150px; 
      margin: 0;
    }
    .main-content {
      margin-left: 250px;
      padding: 20px;
      width: 100%;
    }
    .table th, .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>

<?php include('a_header.php'); ?>
<div class="d-flex">
  <?php include('k_sidebar.php'); ?>
  <main class="main-content">
    <h2 class="mb-1">DATA KUNJUNGAN</h2>
    <h5 class="text-muted">HOSPITAL ANGKASA</h5>
    <hr>

    <!-- Alert jika sukses update -->
    <?php if (isset($_GET['sukses']) && $_GET['sukses'] == 'update'): ?>
      <div class="alert alert-success">Data berhasil diperbarui!</div>
    <?php endif; ?>

    <!-- Filter Poliklinik -->
    <form method="GET" class="mb-3">
      <label for="filter_poli">Filter Poliklinik:</label>
      <select name="kd_poli" id="filter_poli" onchange="this.form.submit()" class="form-select" style="width: 300px; display: inline-block;">
        <option value="">-- Semua Poliklinik --</option>
        <?php
        $poliList = mysqli_query($koneksi, "SELECT kd_poli, nm_poli FROM poliklinik");
        while ($p = mysqli_fetch_assoc($poliList)) {
            $selected = ($filterPoli == $p['kd_poli']) ? 'selected' : '';
            echo "<option value='{$p['kd_poli']}' $selected>{$p['kd_poli']} - {$p['nm_poli']}</option>";
        }
        ?>
      </select>
    </form>

    <!-- Tabel Data -->
    <div class="table-responsive">
      <table class="table table-striped table-bordered align-middle">
        <thead class="table-success">
          <tr>
            <th>No</th>
            <th>Id Kunjungan</th>
            <th>Tanggal Kunjungan</th>
            <th>Nomor Pasien</th>
            <th>Nama Pasien</th>
            <th>Poliklinik</th>
            <th>Jam Kunjungan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;

            if (mysqli_num_rows($query) == 0) {
                echo "<tr><td colspan='8' class='text-center'>Data masih kosong.</td></tr>";
            } else {
                while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['id_kunjungan'] ?></td>
                    <td><?= $row['tgl_kunjungan'] ?></td>
                    <td><?= $row['no_pasien'] ?></td>
                    <td><?= $row['nm_pasien'] ?></td>
                    <td><?= $row['kd_poli'] ?> - <?= $row['nm_poli'] ?></td>
                    <td><?= $row['jam_kunjungan'] ?></td>
                    <td>
                        <div class="d-flex gap-1">
                          <a href="k_update.php?id_kunjungan=<?= $row['id_kunjungan'] ?>" class="btn btn-primary btn-sm">Update</a>
                          <a href="k_delete.php?id_kunjungan=<?= $row['id_kunjungan'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger btn-sm">Hapus</a>
                        </div>
                    </td>
                </tr>
          <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </main>
</div>
</body>
</html>
