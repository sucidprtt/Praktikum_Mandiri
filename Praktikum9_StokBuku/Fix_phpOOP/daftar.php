<?php
    include 'book.php';
    $message = null;

    // Cek apakah data buku tersimpan di sesi sebelumnya
    session_start();
    if (isset($_SESSION['books'])) {
        $books = $_SESSION['books'];
    } else {
        // Inisialisasi array kosong jika tidak ada buku yang tersimpan dalam sesi
        $books = array(); 
    }

    // Handle delete action
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete'])) {
        $indexToDelete = $_GET['delete'];
        if (array_key_exists($indexToDelete, $books)) {
            unset($books[$indexToDelete]);
            $_SESSION['books'] = $books;
            $message = "Book deleted successfully.";
        } else {
            $message = "Failed to delete book.";
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
    <div class="container mt-4 pt-4">
        <figure class="text-dark">
            <blockquote class="blockquote">
                <h1 class="ms-3 text-info-emphasis mt-xxl-5">Stock List</h1>
            </blockquote>
            <figcaption class="ms-3 blockquote-footer text-dark">Create By
                <cite title="data">Suci Dwi Pratiwi</cite>
            </figcaption>
        </figure>
        <?php if ($message) { ?>
            <div class="alert alert-danger d-inline-block" role="alert">
                <?= $message ?>
            </div>
        <?php } ?>
        <table class="table table-hover mt-1 mb-4 table-striped d-table-cell">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($books as $index => $book) { 
                    if (is_int($index)) { ?>
                    <tr>
                        <td><?= $book->getCodeBook() ?></td>
                        <td><?= $book->getName() ?></td>
                        <td class="text-center"><?= $book->getQty() ?></td>
                        <td>
                            <!-- Tombol hapus menggunakan link -->
                            <a href="daftar.php?delete=<?=(string)$index?>" class="btn btn-danger" 
                            onClick="return confirm('are u sure to delete this data?')">
                            <i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php }
                } ?>
            </tbody>
        </table>
        <br>
        <div>
            <a href="index.php" class="btn btn-outline-success">
            <i class="bi bi-back"></i> Back</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>
</html>