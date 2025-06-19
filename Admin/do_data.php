<?php include ('../koneksi.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Dokter</title>
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
  <?php include('do_sidebar.php'); ?>
  <main class="main-content">
    <h2 class="mb-1">DATA DOKTER</h2>
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
            <th>Kode Dokter</th>
            <th>Nama Dokter</th>
            <th>Poliklinik</th>
            <th>Username</th>
            <th>SIP</th>
            <th>Tempat Lahir</th>
            <th>No. Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // JOIN dokter dengan login dan poliklinik
          $sql = "
            SELECT 
              dokter.kd_dokter,
              dokter.nm_dokter,
              dokter.SIP,
              dokter.tmpt_lahir,
              dokter.no_telp,
              dokter.alamat,
              login.username,
              poliklinik.nm_poli
            FROM 
              dokter
            JOIN login ON dokter.kd_user = login.kd_user
            JOIN poliklinik ON dokter.kd_poli = poliklinik.kd_poli
          ";
          $hasil = mysqli_query($koneksi, $sql);
          $no = 1;

          if (mysqli_num_rows($hasil) == 0) {
              echo "<tr><td colspan='10' class='text-center'>Data masih kosong.</td></tr>";
          } else {
              while ($row = mysqli_fetch_assoc($hasil)) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['kd_dokter'] ?></td>
                <td><?= $row['nm_dokter'] ?></td>
                <td><?= $row['nm_poli'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['SIP'] ?></td>
                <td><?= $row['tmpt_lahir'] ?></td>
                <td><?= $row['no_telp'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                  <div class="d-flex gap-1">
                    <a href="do_update.php?kd_dokter=<?= $row['kd_dokter'] ?>" class="btn btn-primary btn-sm">Update</a>
                    <a href="do_delete.php?kd_dokter=<?= $row['kd_dokter'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger btn-sm">Hapus</a>
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
