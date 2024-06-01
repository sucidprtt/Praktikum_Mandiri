<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Pajak Tiket Pesawat</title>
</head>
<body>
    <h2>Form Pemesanan Tiket Pesawat</h2>
    <form action="pajak.php" method="post">
        <label for="bandara_asal">Bandara Asal:</label>
        <select name="bandara_asal" id="bandara_asal">
            <?php
            $bandara_asal = array(
                "Soekarno Hatta" => 65000,
                "Husein Sastranegara" => 50000,
                "Abdul Rachman Saleh" => 40000,
                "Juanda" => 30000
            );
            ksort($bandara_asal);
            foreach ($bandara_asal as $bandara => $pajak) {
                echo "<option value='$pajak'>$bandara</option>";
            }
            ?>
        </select><br>

        <label for="bandara_tujuan">Bandara Tujuan:</label>
        <select name="bandara_tujuan" id="bandara_tujuan">
            <?php
            $bandara_tujuan = array(
                "Ngurah Rai" => 85000,
                "Hasanuddin" => 70000,
                "Inanwatan" => 90000,
                "Sultan Iskandar Muda" => 60000
            );
            ksort($bandara_tujuan);
            foreach ($bandara_tujuan as $bandara => $pajak) {
                echo "<option value='$pajak'>$bandara</option>";
            }
            ?>
        </select><br>

        <label for="harga_tiket">Harga Tiket:</label>
        <input type="text" name="harga_tiket" id="harga_tiket"><br>

        <input type="submit" value="Hitung Pajak">
    </form>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bandara_asal = $_POST["bandara_asal"];
    $bandara_tujuan = $_POST["bandara_tujuan"];
    $harga_tiket = $_POST["harga_tiket"];

    // Menghitung total pajak dari bandara asal dan tujuan
    $total_pajak = $bandara_asal + $bandara_tujuan;

    // Total harga tiket = pajak + harga tiket
    $total_harga_tiket = $total_pajak + $harga_tiket;

    // Menampilkan hasil perhitungan
    echo "<h2>Hasil Perhitungan</h2>";
    echo "<p>Harga Tiket: Rp. " . number_format($harga_tiket) . "</p>";
    echo "<p>Pajak Bandara Asal: Rp. " . number_format($bandara_asal) . "</p>";
    echo "<p>Pajak Bandara Tujuan: Rp. " . number_format($bandara_tujuan) . "</p>";
    echo "<p>Total Pajak: Rp. " . number_format($total_pajak) . "</p>";
    echo "<p>Total Harga Tiket: Rp. " . number_format($total_harga_tiket) . "</p>";
}
?>
