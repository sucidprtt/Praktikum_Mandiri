<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Stock</title>
    <!-- Integrasi CCDN CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="container mt-4 pt-4">
        <figure class="text-dark">
            <blockquote class="blockquote">
                <h1 class="text-info-emphasis mt-xxl-5">Stock List</h1>
            </blockquote>
            <figcaption class="blockquote-footer text-dark">Create By 
                <cite title="data">Suci Dwi Pratiwi</cite>
            </figcaption>
        </figure>
        <table class="table table-hover mt-3 mb-5 table-striped">
            <thead class="table-secondary">
                <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">QTY</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td><?= $book->getCodeBook() ?></td>
                    <td><?= $book->getName() ?></td>
                    <td><?= $book->getQty() ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="baten btn btn-light opacity-75">
            <a href="index2.php">Back</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>
</html>