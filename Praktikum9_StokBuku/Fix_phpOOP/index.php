<?php
include 'book.php';
$message = null;
$book = null;

// Mengecek apakah formulir telah disubmit
if (isset($_POST['submit'])) {
    try {
        // Membuat objek Book dari data yang dimasukkan oleh pengguna
        $new_book = new Book($_POST['code_book'], $_POST['name'], $_POST['qty']);

        // Memulai atau melanjutkan sesi
        session_start();

        // Mengecek apakah ada data buku yang sudah tersimpan dalam sesi
        if (!isset($_SESSION['books'])) {
            // Jika tidak ada, inisialisasi array untuk menyimpan data buku
            $_SESSION['books'] = array();
        }

        // Menambahkan data buku baru ke dalam array
        $_SESSION['books'][] = $new_book;

        // Mengarahkan pengguna ke halaman daftar.php
        header("Location: daftar.php");
        exit(); // Menghentikan eksekusi kode setelah header redirect
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Stock</title>
    <!-- Integrasi CCDN CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <!-- Tampilan Awal -->
    <div class="container mt-5 pt-4">
        <!-- Figure Judul -->
        <div class="ms-2">
            <h1 class="text-info-emphasis">Book's Supply</h1>
            <p class=""><em>input your incoming data, here!</em></p>
        </div>
        <!-- Tampilan Pesan Error -->
        <div class="toast text-bg-danger mb-3" role="alert" aria-live="assertive" aria-atomic="true" id="toast">
            <div class="toast-header">
                <strong class="me-auto">Failed</strong>
                <small class="text-body-secondary">Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= $message ?>
            </div>
        </div>
        <!-- Form Inputan -->
        <div class="container mt-4 d-flex">
            <form action="index.php" method="post">
                <div class="mb-4 row">
                    <label for="code_book" class="form-label">Code Book</label>
                    <div class="col-12">
                        <input type="text" name="code_book" class="form-control shadow-sm p-2 bg-light rounded" 
                        id="code_book" placeholder="cth: SP29">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="name" class="form-label">Name's Book</label>
                    <div class="col-15">
                        <input type="text" name="name" class="form-control shadow-sm p-2 bg-light rounded" 
                        id="name" placeholder="Enter Title">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="qty" class="form-label">Quantity</label>
                    <div class="col-12">
                        <input type="number" name="qty" class="form-control shadow-sm p-2 bg-light rounded" 
                        id="qty">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-success">
                    <i class="bi bi-save"></i> Send</button>
            </form>
        </div>
    </div>
    <!-- Memberikan Nilai pada Output -->
    <?php if ($book > null) { ?>
        <?php
        header("Location: daftar.php");
        ?>
    <?php } ?>

    <?php
    if (isset($message)) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                var toast = new bootstrap.Toast(document.getElementById('toast'));
                toast.show();
                });
            </script>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>
</html>