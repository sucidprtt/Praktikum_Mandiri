<?php 
  include 'koneksi.php';

  $query = "SELECT mahasiswa.nama AS 'nama_mhs' , matakuliah.nama AS 'nama_matkul', matakuliah.jumlah_sks 
  FROM mahasiswa JOIN krs ON mahasiswa.npm = krs.mahasiswa_npm JOIN matakuliah 
  ON matakuliah.kodemk = krs.matakuliah_kodemk ORDER BY mahasiswa.nPM ASC";
  $sql = mysqli_query($koneksi, $query);
  $no = 0;
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="white">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>THE CRUDZ</title>
  <!-- CDN LINK CSS BOOTSTRAP  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- LINK CSS BOOTSTRAP -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar bg-body-tertiary mb-5 shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#" style="font-size : 1.1em;">
        <img src="img/LogoTBZ.png" alt="logo" style="width: 2.3em; margin-right: 0.5em;">
        <strong class="mt-5">THE CRUDZ - 7th Sense</strong>
      </a>
      <!-- TAB PILIHAN -->
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active bg-secondary" aria-current="page" href="#">KRS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark-emphasis" href="table-group.php">Tabel Kuliah</a>
        </li>
        </ul>
        <!-- AKHIR TAB PILIHAN -->
      </div>
    </nav>
    <!-- AKHIR NAVBAR -->
    
  <div class="container mt-5 pt-4">
    <!-- Figure JUDUL TABEL -->
    <figure class="text-dark">
      <blockquote class="blockquote">
          <h1 class="text-info-emphasis mt-xxl-4">Tabel KRS</h1>
          <p>Berisi Data Mahasiswa yang Mengambil KRS</p>
      </blockquote>
    </figure>
      <!-- AKHIR FIGURE JUDUL TABEL -->
      <!-- TABLE KRS -->
    <div class="text-info-emphasis">
      <table class="table table-hover mt-4 table-striped">
        <thead class="table-secondary">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Mata Kuliah</th>
            <th scope="col">Keterangan</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php
            while ($result = mysqli_fetch_assoc($sql)) {
          ?>
          <tr>
            <th scope="row">
              <?php echo ++$no; ?>
            </th>
            <td>
            <?php echo $result['nama_mhs'];?>
            </td>
            <td>
            <?php echo $result['nama_matkul'];?>
            </td>
            <td>
            <?php echo "<font color='#008080'>".$result['nama_mhs']."</font>" . 
            " Mengambil Mata Kuliah"."<font color='#008080'> ".$result['nama_matkul']."</font>" .
            " (".$result['jumlah_sks']." SKS)";?>
            </td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
    <!-- AKHIR TABLE KRS -->
  </div>
</body>
</html>