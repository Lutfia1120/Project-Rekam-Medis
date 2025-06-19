<?php include ('../koneksi.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampil Data Obat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding-top: 150px; 
      margin: 0;
    }
    .main-content {
      margin-right: 200px;
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
  <main class="main-content">
    <h2 class="mb-1">DATA OBAT</h2>
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
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Jumlah Obat</th>
            <th>Ukuran Obat</th>
            <th>Harga Obat</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM obat";
          $hasil = mysqli_query($koneksi, $sql);
          $no = 1;

          if (mysqli_num_rows($hasil) == 0) {
              echo "<tr><td colspan='12' class='text-center'>Data masih kosong.</td></tr>";
          } else {
              while ($row = mysqli_fetch_assoc($hasil)) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['kd_obat'] ?></td>
                <td><?= $row['nm_obat'] ?></td>
                <td><?= $row['jml_obat'] ?></td>
                <td><?= $row['ukuran'] ?></td>
                <td>Rp.<?= $row['harga'] ?></td>
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
