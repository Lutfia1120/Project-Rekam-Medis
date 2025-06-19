<?php include ('../koneksi.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Rekam Medis</title>
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
  <?php include('rm_sidebar.php'); ?>
  <main class="main-content">
    <h2 class="mb-1">DATA REKAM MEDIS</h2>
    <h5 class="text-muted">HOSPITAL ANGKASA</h5>
    <hr>

    <?php if (isset($_GET['sukses']) && $_GET['sukses'] == 'update'): ?>
      <div class="alert alert-success">Data berhasil diperbarui!</div>
    <?php endif; ?>

    <div class="table-responsive">
      <table class="table table-striped table-bordered align-middle">
        <thead class="table-success">
          <tr>
            <th>No</th>
            <th>No RM</th>
            <th>Kode Tindakan</th>
            <th>Kode Obat</th>
            <th>Kode User</th>
            <th>No Pasien</th>
            <th>Keluhan</th>
            <th>Diagnosa</th>
            <th>Resep</th>
            <th>Tanggal Periksa</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM rekam_medis";
          $hasil = mysqli_query($koneksi, $sql);
          $no = 1;

          if (mysqli_num_rows($hasil) == 0) {
              echo "<tr><td colspan='10' class='text-center'>Data masih kosong.</td></tr>";
          } else {
              while ($row = mysqli_fetch_assoc($hasil)) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['no_RM'] ?></td>
                <td><?= $row['kd_tindakan'] ?></td>
                <td><?= $row['kd_obat'] ?></td>
                <td><?= $row['kd_user'] ?></td>
                <td><?= $row['no_pasien'] ?></td>
                <td><?= $row['keluhan'] ?></td>
                <td><?= $row['diagnosa'] ?></td>
                <td><?= $row['resep'] ?></td>
                <td><?= $row['tgl_periksa'] ?></td>
                <td><?= $row['ket'] ?></td>
                <td>
                  <div class="d-flex gap-1">
                    <a href="rm_update.php?no_RM=<?= $row['no_RM'] ?>" class="btn btn-primary btn-sm">Update</a>
                    <a href="rm_delete.php?no_RM=<?= $row['no_RM'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger btn-sm">Hapus</a>
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
