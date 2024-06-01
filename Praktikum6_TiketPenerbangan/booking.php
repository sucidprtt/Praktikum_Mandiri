<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Flight Ticket</title>
    <!-- Integrasi CCDN CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="justify-content-between bg-success-subtle min-vh-100 p-xxl-5">
        <h1 class="" style="color:teal; margin-bottom: 2px; margin-top: 50px">FLIGHT IN HERE</h1>
        <p><em>Hold the world from the sky, now!</em></p>
        <form action="eticket.php" method="post">
            <div class="card opacity-75 text-white w-25 rounded" id="">
                <!-- Nama Masakapai -->
                <div class="row mb-3 mt-4">
                    <label for="inputName1" class="form-label">Airline</label>
                    <input type="text" class="form-control shadow-sm p-2 bg-light rounded w-50" style="margin-left: 100px;" name="airline" value="<?=isset($_POST['nama']) ? $_POST['nama'] : ''?>"/>
                </div>
                <!-- Bandara Asal -->
                <div class="row mb-3">
                    <label for="bandara_asal" class="form-label">Origin</label>
                    <select name="bandara_asal" id="bandara_asal" class="shadow-sm p-2 bg-light rounded w-50" style="margin-left: 100px;">                   
                    <option value="">Choose Origin</option>
                    <?php
                    $bandara_asal = array(
                        "Abdul Rachman Saleh",
                        "Husein Sastranegara",
                        "Juanda",
                        "Soekarno Hatta"
                    );
                    foreach ($bandara_asal as $bandara) {
                        echo "<option value='$bandara'>$bandara</option>";
                    }
                    ?>
                    </select>
                </div>
                <!-- Bandara Tujuan -->
                <div class="row mb-3">
                    <label for="bandara_tujuan" class="form-label">Destination</label>
                    <select name="bandara_tujuan" id="bandara_tujuan" class="shadow-sm p-2 bg-light rounded w-50" style="margin-left: 100px;">
                    <option value="">Choose Destination</option>
                        <?php
                        $bandara_tujuan = array(
                            "Hasanuddin",
                            "Inanwatan",
                            "Ngurah Rai",
                            "Sultan Iskandar Muda"
                        );
                        foreach ($bandara_tujuan as $bandara) {
                            echo "<option value='$bandara'>$bandara</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- Data Kelas Tiket -->
                <div class="row mb-3">
                    <label for="jenis_tiket" class="form-label">Class</label>
                    <select name="jenis_tiket" id="jenis_tiket" class="shadow-sm p-2 bg-light rounded w-50 mb-3" style="margin-left: 100px;">
                    <option value="">Choose Class</option>
                    <?php
                    $jenis_tiket = array(
                        "Ekonomi",
                        "Premium",
                        "Bisnis",
                        "Private"
                    );
                    foreach ($jenis_tiket as $bandara) {
                        echo "<option value='$bandara'>$bandara</option>";
                    }
                    ?>  
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <input type="submit" name="submit" value="submit" style="border-color:teal; width: auto; border-radius: 20px; font-size: 15px">
            </div>
        </form>
    </div>
</body>
</html>
