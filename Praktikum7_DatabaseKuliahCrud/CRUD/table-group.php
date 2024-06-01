<?php 
  include 'koneksi.php';
  $query_mahasiswa = "SELECT * FROM mahasiswa"; 
  $sql_mahasiswa = mysqli_query($koneksi, $query_mahasiswa);
  $query_matakuliah = "SELECT * FROM matakuliah"; 
  $sql_matakuliah = mysqli_query($koneksi, $query_matakuliah);
  $query_krs = "SELECT * FROM krs"; 
  $sql_krs = mysqli_query($koneksi, $query_krs);
  $no = 0;
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="white">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Table Group</title>
  <!-- CDN LINK CSS BOOTSTRAP  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- LINK CSS BOOTSTRAP -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- BOOTSTRAP ICON -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
          <a class="nav-link text-info-emphasis " href="show.php">KRS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active bg-secondary" aria-current="page" href="#">Tabel Kuliah</a>
        </li>
      </ul>
      <!-- AKHIR TAB PILIHAN -->
    </div>
  </nav>
  <!-- AKHIR NAVBAR -->


  <!-- DATABASE TABLE MAHASISWA -->
  <div class="container mt-4 pt-4">
    <!-- Figure JUDUL TABEL -->
    <figure class="text-dark">
      <blockquote class="blockquote">
        <h1 class="text-info-emphasis mt-xxl-5">Tabel Mahasiswa</h1>
      </blockquote>
      <figcaption class="blockquote-footer text-dark">
        Berisi Basis Data <cite title="data krs">Tabel Mahasiswa</cite>
      </figcaption>
    </figure>
    <!-- AKHIR FIGURE JUDUL TABEL -->
    <!-- BUTTON TAMBAH DATA MAHASISWA -->
    <a href="add-mhs.php" class="btn bg-success border-0 text-white active" role="button" aria-pressed="true">
      <i class="bi bi-plus-square"></i>
      Update Data
    </a>
    <!-- TABLE MAHASISWA -->
    <table class="table table-hover mt-3 mb-5 table-striped">
      <thead class="table-secondary">
        <tr>
          <th scope="col">NPM</th>
          <th scope="col">Nama</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Alamat</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
          while ($result = mysqli_fetch_assoc($sql_mahasiswa)) {
        ?>
        <tr>
          <td>
            <?php echo $result['npm'];?>
          </td>
          <td>
            <?php echo $result['nama'];?>
          </td>
          <td>
            <?php echo $result['jurusan'];?>
          </td>
          <td>
            <?php echo $result['alamat'];?>
          </td>
          <td>
            <a type="button" class="btn btn-warning" href="add-mhs.php?ubah=<?php echo $result['npm'];?>"><i class="bi bi-pencil"></i></a>
            <a type="button" class="btn btn-danger" href="load-mhs.php?hapus=<?php echo $result['npm'];?>" onClick="return confirm('apakah anda yakin ingin menghapus data tersebut?')"> <i class="bi bi-trash"></i></a>
          </td>
        </tr>
        <?php
         }
        ?>

      </tbody>
    </table>
  </div>
  <!-- AKHIR TABLE MAHASISWA -->
  <!-- AKHIR DATABASE TABLE MAHASISWA -->


  <!-- DATABASE TABLE MATAKULIAH -->
  <div class="container mb-5">
    <!-- Figure JUDUL TABEL -->
    <figure class="text-info-emphasis">
      <blockquote class="blockquote">
        <h1>Tabel Mata Kuliah</h1>
      </blockquote>
      <figcaption class="blockquote-footer text-dark">
        Berisi Basis Data <cite title="data krs">Tabel Matakuliah</cite>
      </figcaption>
    </figure>
    <!-- AKHIR FIGURE JUDUL TABEL -->
    <!-- BUTTON TAMBAH DATA MATA KULIAH -->
    <a href="add-mk.php" class="btn btn-success border-0 text-white active" role="button" aria-pressed="true">
      <i class="bi bi-plus-square"></i>
      Update Data
    </a>
    <!-- TABLE MATAKULIAH -->
    <table class="table table-hover mt-3 mb-5 table-striped">
      <thead class="table-secondary">
        <tr>
          <th scope="col">Kode MK</th>
          <th scope="col">Nama</th>
          <th scope="col">Jumlah SKS</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php
          while ($result = mysqli_fetch_assoc($sql_matakuliah)) {
        ?>
        <tr>
          <td>
            <?php echo $result['kodemk'];?>
          </td>
          <td>
          <?php echo $result['nama'];?>
          </td>
          <td>
          <?php echo $result['jumlah_sks']." sks";?>
          </td>
          <td>
            <a type="button" class="btn btn-warning" href="add-mk.php?ubah=<?php echo $result['kodemk'];?>"><i class="bi bi-pencil"></i></a>
            <a type="button" class="btn btn-danger" href="load-mk.php?hapus=<?php echo $result['kodemk'];?>" onClick="return confirm('apakah anda yakin ingin menghapus data tersebut?')"> <i class="bi bi-trash"></i></a>
          </td>
        </tr>
       <?php
          }
        ?>
      </tbody>
    </table>
  </div>
  <!-- AKHIR TABLE MATAKULIAH -->
  <!-- AKHIR DATABASE TABLE MATAKULIAH -->

  <!-- DATABASE TABLE KRS -->
  <div class="container mb-5">
    <!-- Figure JUDUL TABEL -->
    <figure class="text-info-emphasis">
      <blockquote class="blockquote">
        <h1>Tabel KRS</h1>
      </blockquote>
      <figcaption class="blockquote-footer text-dark">
        Berisi Basis Data <cite title="data krs">Tabel KRS</cite>
      </figcaption>
    </figure>
    <!-- AKHIR FIGURE JUDUL TABEL -->
    <!-- BUTTON TAMBAH DATA KRS -->
    <a href="add-krs.php" class="btn btn-success border-0 text-white active" role="button" aria-pressed="true">
      <i class="bi bi-plus-square"></i>
      Update Data
    </a>
    <!-- TABLE KRS -->
    <table class="table table-hover mt-3 table-striped">
      <thead class="table-secondary">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NPM Mahasiswa</th>
          <th scope="col">Kode MK</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php
          while ($result = mysqli_fetch_assoc($sql_krs)) {
        ?>
        <tr>
          <td>
            <?php echo $result['id'];?>
          </td>
          <td>
            <?php echo $result['mahasiswa_npm'];?>
          </td>
          <td>
            <?php echo $result['matakuliah_kodemk'];?>
          </td>
          <td>
            <a type="button" class="btn btn-warning" href="add-krs.php?ubah=<?php echo $result['id'];?>"><i class="bi bi-pencil"></i> </a>
            <a type="button" class="btn btn-danger" href="load-krs.php?hapus=<?php echo $result['id'];?>" onClick="return confirm('apakah anda yakin ingin menghapus data tersebut?')"> <i class="bi bi-trash"></i> </a>
          </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
  <!-- AKHIR TABLE KRS -->
  <!-- AKHIR DATABASE TABLE KRS -->
</body>
</html>