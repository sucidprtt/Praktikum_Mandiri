<?php 
  include 'koneksi.php';

  $npm = '';
  $nama = '';
  $jurusan = '';
  $alamat = '';

  if (isset($_GET['ubah'])) {
    $npm = $_GET['ubah'];

    $query = "SELECT * FROM mahasiswa WHERE npm = '$npm';";
    $sql = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama = $result['nama'];
    $jurusan = $result['jurusan'];
    $alamat = $result['alamat'];

  }
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="white">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>T7 CRUD</title>
  <!-- CDN LINK CSS BOOTSTRAP  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
    </div>
  </nav>
  <!-- AKHIR NAVBAR -->

  <!-- CONTAINER BODY CONTENT -->
  <div class="container mt-5 pt-4">
    <!-- Figure JUDUL TABEL -->
    <figure class="text-dark">
      <blockquote class="blockquote">
        <h1 class="text-info-emphasis mt-xxl-5">Tabel Mahasiswa</h1>
        <p>Isi Data dengan Baik dan Benar</p>
      </blockquote>
    </figure>
    <!-- AKHIR FIGURE JUDUL TABEL -->

    <!-- CONTAINER FORM -->
    <div class="container text-dark mt-5">
        <form method="POST" action="load-mhs.php" >

          <div class="mb-3 row">
            <label for="inputNpm" class="col-sm-2 col-form-label">NPM</label>
              <div class="col-sm-5">
                <input required type="text" class="form-control shadow-sm bg-light rounded" id="inputNpm" name="inputNpm" placeholder="Input NPM" value="<?php echo $npm ?>">
              </div>
          </div>
    
          <div class="mb-3 row">
            <label for="inputNamaMhs" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-5">
                <input required type="text" class="form-control shadow-sm bg-light rounded" id="inputNamaMhs" name="inputNamaMhs" placeholder="Input Nama" value="<?php echo $nama ?>">
              </div>
          </div>
          
          <div class="mb-3 row">
            <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
              <div class="col-sm-5">
                <select required class="form-select shadow-sm bg-light rounded" id="inputJurusan" name="inputJurusan">
                  <option>Pilih Jurusan</option>
                  <option <?php if ($jurusan == 'Sistem Informasi'){echo "selected";}?> value="Sistem Informasi"> Sistem Informasi</option>
                  <option <?php if ($jurusan == 'Teknik Informatika'){echo "selected";}?> value="Teknik Informatika">Teknik Informatika</option>
                </select>
              </div>
          </div>
          
          <div class="mb-3 row">
            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-5">
                <textarea required class="form-control shadow-sm bg-light rounded" id="inputAlamat" name="inputAlamat" rows="3"><?php echo $alamat ?></textarea>
              </div>
          </div>
          
          <div class="mb-3 row mt-5">
            <!-- BUTTON TAMBAH DATA MAHASISWA -->
            <div class="col">
              <?php
                if (isset($_GET['ubah'])) {
              ?>
              <button type="submit" name="aksi" value="edit" class="btn btn-success active">
                <i class="bi bi-save2"></i>
                Simpan Perubahan
              </button>
              <?php
              } else {
                ?>
                <button type="submit" name="aksi" value="add" class="btn btn-outline-secondary active">
                  <i class="bi bi-plus-square"></i>
                  Simpan
                </button>
              <?php
              }
              ?>  
              <a type="button" href="table-group.php" class="btn btn-danger active">
                <i class="bi bi-backspace"></i>
                Batal
              </a>
              <!-- AKHIR BUTTON TAMBAH DATA MAHASISWA -->
            </div>
          </div>
        </form>
    </div>
    <!-- AKHIR CONTAINER FORM -->
  </div>
  <!-- AKHIR CONTAINER BODY CONTENT -->
</body>
</html>