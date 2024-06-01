<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Book</title>
    <!-- Integrasi CCDN CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 pt-4">
        <div class="ms-2">
            <h1 class="text-info-emphasis">Book's Supply</h1>
            <p class=""><em>input your incoming data, here!</em></p>
        </div>
        <div class="toast text-bg-danger mb-5" role="alert" aria-live="assertive" aria-atomic="true" id="toast">
            <div class="toast-header">
                <strong class="me-auto">Failed</strong>
                <small class="text-body-secondary">Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
            <?= $message ?>
            </div>
        </div>
        <div class="container mt-4 d-flex">
            <form action="daftar.php" method="post">
                <div class="mb-4 row">
                    <label for="code_book" class="form-label">Code Book</label>
                    <div class="col-12">
                        <input type="text" name="code_book" class="form-control shadow-sm p-2 bg-light rounded" id="code_book" placeholder="cth: SP29">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="name" class="form-label">Name's Book</label>
                    <div class="col-12">
                        <input type="text" name="name" class="form-control shadow-sm p-2 bg-light rounded" id="name" placeholder="Enter Title">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="qty" class="form-label">Quantity</label>
                    <div class="col-12">
                        <input type="number" name="qty" class="form-control shadow-sm p-2 bg-light rounded" id="qty">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-success">Send</button>
            </form>
        </div>
    </div>
</body>
</html>