<?php include ('../koneksi.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampil Data Pendaftaran</title>
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
  <?php include('p_sidebar.php'); ?>
  <main class="main-content">
    <h2 class="mb-1">DATA PASIEN</h2>
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
            <th>Nomor Daftar</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Agama </th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Usia</th>
            <th>No.Telepon</th>
            <th>Nama KK</th>
            <th>Hub.Keluarga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM pasien";
          $hasil = mysqli_query($koneksi, $sql);
          $no = 1;

          if (mysqli_num_rows($hasil) == 0) {
              echo "<tr><td colspan='12' class='text-center'>Data masih kosong.</td></tr>";
          } else {
              while ($row = mysqli_fetch_assoc($hasil)) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['no_pasien'] ?></td>
                <td><?= $row['nm_pasien'] ?></td>
                <td><?= $row['j_kel'] ?></td>
                <td><?= $row['agama'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['tgl_lahir'] ?></td>
                <td><?= $row['usia'] ?></td>
                <td><?= $row['no_telp'] ?></td>
                <td><?= $row['nm_kk'] ?></td>
                <td><?= $row['hub_kel'] ?></td>
                <td>
                  <div class="d-flex gap-1">
                    <a href="p_lihat.php?no_pasien=<?= $row['no_pasien'] ?>" class="btn btn-primary btn-sm">Lihat</a>
                    <a href="p_delete.php?no_pasien=<?= $row['no_pasien'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger btn-sm">Hapus</a>
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
