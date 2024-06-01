<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $airline = $_POST["airline"];
    $bandara_asal = $_POST["bandara_asal"];
    $bandara_tujuan = $_POST["bandara_tujuan"];
    $jenis_tiket = $_POST["jenis_tiket"];

    // Menentukan harga tiket berdasarkan jenis tiket
    switch ($jenis_tiket) {
        case "Ekonomi":
            $harga_tiket = 1200000;
            break;
        case "Premium":
            $harga_tiket = 1500000;
            break;
        case "Bisnis":
            $harga_tiket = 1800000;
            break;
        case "Privat":
            $harga_tiket = 2500000;
            break;
        default:
            $harga_tiket = 0;
            break;
    }

    function generateRandomString($length = 8) {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    
    // Panggil fungsi untuk mendapatkan nomor acak 8 karakter
    $nomor_acak = generateRandomString(8);

    // Menyesuaikan zona waktu
    date_default_timezone_set('Asia/Jakarta');

    // Mendapatkan waktu saat ini
    $waktu_terkini = date("Y-m-d H:i");

    // Mendefinisikan tarif pajak untuk bandara asal dan bandara tujuan
    $pajak_asal = array(
        "Soekarno Hatta" => 65000,
        "Husein Sastranegara" => 50000,
        "Abdul Rachman Saleh" => 40000,
        "Juanda" => 30000
    );

    $pajak_tujuan = array(
        "Ngurah Rai" => 85000,
        "Hasanuddin" => 70000,
        "Inanwatan" => 90000,
        "Sultan Iskandar Muda" => 60000
    );

    // Menghitung pajak
    $pajak = $pajak_asal[$bandara_asal] + $pajak_tujuan[$bandara_tujuan];

    // Menghitung total harga tiket (harga + pajak)
    $total_harga = $pajak + $harga_tiket;

    // Menampilkan hasil
    echo "<h2>Detail Penerbangan</h2>";
    echo "<p>Airline's Name : $airline</p>";
    echo "Nomor : E$nomor_acak <br>";
    echo "Tanggal : $waktu_terkini";
    echo "<p>Origin: $bandara_asal</p>";
    echo "<p>Destination : $bandara_tujuan</p>";
    echo "<p>Class : $jenis_tiket</p>";
    echo "<p>Price: Rp. ". number_format($harga_tiket) . "</p>";
    echo "<p>Tax: Rp. " . number_format($pajak) . "</p>";
    echo "<p>Payment: Rp. " . number_format($total_harga) . "</p>";
    }
?>

<div>
    <a href="index.php" class="btn btn-primary">Back</a>
</div>
