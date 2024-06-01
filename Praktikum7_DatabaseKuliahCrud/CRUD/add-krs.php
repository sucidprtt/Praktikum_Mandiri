<?php 
  include 'koneksi.php';

  $id = '';
  $mahasiswa_npm = '';
  $matakuliah_kodemk = '';

  if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];

    $query = "SELECT * FROM krs WHERE id = '$id';";
    $sql = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($sql);

    $mahasiswa_npm = $result['mahasiswa_npm'];
    $matakuliah_kodemk = $result['matakuliah_kodemk'];

  }
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>T7 CRUD</title>
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
    </div>
  </nav>
  <!-- AKHIR NAVBAR -->

  <!-- CONTAINER BODY CONTENT -->
  <div class="container mt-5 pt-4">
    <!-- Figure JUDUL TABEL -->
    <figure class="text-dark">
      <blockquote class="blockquote">
        <h1 class="text-info-emphasis mt-xxl-5">Tabel KRS</h1>
        <p>Isi Data dengan Baik dan Benar</p>
      </blockquote>
    </figure>
    <!-- AKHIR FIGURE JUDUL TABEL -->

    <!-- CONTAINER FORM -->
    <div class="container text-dark mt-4">
      <form action="load-krs.php" method="POST">
        <div class="mb-3 row">
          <label for="inputId" class="col-form-label">ID</label>
          <div class="col-sm-5">
            <input value="<?php echo $id ?>" type="text" class="form-control shadow-sm bg-body-secondary rounded" id="inputId" name="inputId" placeholder="ID tidak perlu diisi, akan ditentukan secara otomatis" <?php if ($id == '') {echo "disabled";}; ?> >
          </div>
        </div>

        <div class="mb-3 row">
          <label for="inputNpmMahasiswa" class="col-form-label">NPM Mahasiswa</label>
          <div class="col-sm-5">
            <input required value="<?php echo $mahasiswa_npm ?>" type="text" class="form-control shadow-sm bg-light rounded" id="inputNpmMahasiswa" name="inputNpmMahasiswa" placeholder="Input NPM">
          </div>
        </div>
  
        <div class="mb-3 row">
          <label for="inputKdMK" class="col-form-label">Kode MK</label>
          <div class="col-sm-5">
            <input required value="<?php echo $matakuliah_kodemk ?>" type="text" class="form-control shadow-sm bg-light rounded" id="inputKdMK" name="inputKdMK" placeholder="Cth: MK01">
          </div>
        </div>
  
        <div class="mb-3 row mt-5">
          <!-- BUTTON TAMBAH DATA MAHASISWA -->
          <div class="col">
          <?php
              if (isset($_GET['ubah'])) {
            ?>
            <button type="submit" name="aksi" value="edit" class="btn btn-success active" >
              <i class="bi bi-save2"></i>
              Simpan Perubahan
            </button>
            <?php
            } else {
              ?>
              <button type="submit" name="aksi" value="add" class="btn btn-outline-secondary active" >
                <i class="bi bi-plus-square"></i>
                Simpan
              </button>
            <?php
            }
            ?>
  
            <a type="button" href="table-group.php" class="btn btn-danger active"  >
              <i class="bi bi-backspace"></i>
              Batal
            </a>
  
          </div>
          <!-- AKHIR BUTTON TAMBAH DATA MAHASISWA -->
        </div>
      </form>
    </div>
    <!-- AKHIR CONTAINER FORM -->
  </div>
  <!-- AKHIR CONTAINER BODY CONTENT -->
</body>
</html>