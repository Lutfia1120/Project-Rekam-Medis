<?php
include('../koneksi.php');
include('a_header.php');
include('rm_sidebar.php');

$sql = "SELECT rm.no_RM, p.nm_pasien, t.nm_tindakan, rm.keluhan, rm.diagnosa, 
               rm.resep, rm.tgl_periksa, rm.ket, l.username, 
               o.kd_obat, o.nm_obat
        FROM rekam_medis rm
        JOIN pasien p ON rm.no_pasien = p.no_pasien
        JOIN tindakan t ON rm.kd_tindakan = t.kd_tindakan
        JOIN obat o ON rm.kd_obat = o.kd_obat
        JOIN login l ON rm.kd_user = l.kd_user
        ORDER BY rm.tgl_periksa DESC";

$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Rekam Medis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding-top: 120px;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
    .main-content {
      margin-left: 250px;
      padding: 20px;
    }
    .table th, .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <main class="main-content w-100">
      <div class="container">
        <h2 class="mb-3">Laporan Rekam Medis</h2>
        <h5 class="text-muted">HOSPITAL ANGKASA</h5>
        <hr>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-success">
              <tr>
                <th>No</th>
                <th>No RM</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Tindakan</th>
                <th>Keluhan</th>
                <th>Diagnosa</th>
                <th>Resep</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Tanggal Periksa</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row['no_RM'] ?></td>
                  <td><?= $row['nm_pasien'] ?></td>
                  <td><?= $row['username'] ?></td>
                  <td><?= $row['nm_tindakan'] ?></td>
                  <td><?= $row['keluhan'] ?></td>
                  <td><?= $row['diagnosa'] ?></td>
                  <td><?= $row['resep'] ?></td>
                  <td><?= $row['kd_obat'] ?></td>
                  <td><?= $row['nm_obat'] ?></td>
                  <td><?= $row['tgl_periksa'] ?></td>
                  <td><?= $row['ket'] ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
