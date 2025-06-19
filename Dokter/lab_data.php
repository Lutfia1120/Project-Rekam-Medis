<?php include ('../koneksi.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Laboratorium</title>
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
  <?php include('l_sidebar.php'); ?>
  <main class="main-content">
    <h2 class="mb-1">DATA LABORATORIUM</h2>
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
            <th>Kode Laboratorium</th>
            <th>No RM</th>
            <th>Hasil Laboratorium</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "
            SELECT 
                laboratorium.kd_lab,
                laboratorium.hasil_lab,
                laboratorium.ket,           
                rekam_medis.no_RM
            FROM 
                laboratorium
            JOIN rekam_medis ON laboratorium.no_RM = rekam_medis.no_RM
        ";


          $hasil = mysqli_query($koneksi, $sql);
          $no = 1;

          if (mysqli_num_rows($hasil) == 0) {
              echo "<tr><td colspan='10' class='text-center'>Data masih kosong.</td></tr>";
          } else {
              while ($row = mysqli_fetch_assoc($hasil)) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['kd_lab'] ?></td>
                <td><?= $row['no_RM'] ?></td>
                <td><?= $row['hasil_lab'] ?></td>
                <td><?= $row['ket'] ?></td>
                <td>
                  <div class="d-flex gap-1">
                    <a href="l_update.php?kd_lab=<?= $row['kd_lab'] ?>" class="btn btn-primary btn-sm">Update</a>
                    <a href="l_delete.php?kd_lab=<?= $row['kd_lab'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger btn-sm">Hapus</a>
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
