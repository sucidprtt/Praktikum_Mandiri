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

        //Membuat Fungsi untuk nomor aacak
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
    ?>

    <div class="output w-100">
        <h2 class="judul">GOTRIP E-TICKET</h2>
        <p><em>by: Suci Dwi Pratiwi</em></p>
            <table class="w-75 mt-xxl-3 opacity-75">
                <tr class="hid bg-dark.bg-gradient">
                    <th>Airline's Name</th>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Class</th>
                    <th>Price</th>
                    <th>Tax</th>
                    <th>Payment</th>
                </tr>
                <tr class="bg-light">
                    <td><?php echo $airline; ?></td>
                    <td>E<?php echo $nomor_acak; ?></td>
                    <td><?php echo $waktu_terkini; ?></td>
                    <td><?php echo $bandara_asal; ?></td>
                    <td><?php echo $bandara_tujuan; ?></td>
                    <td><?php echo $jenis_tiket; ?></td>
                    <td>Rp. <?php echo number_format($harga_tiket); ?></td>
                    <td>Rp. <?php echo number_format($pajak); ?></td>
                    <td>Rp. <?php echo number_format($total_harga); ?></td>
                </tr>
            </table>
        <br>
        <div class="baten btn btn-light opacity-75">
            <a href="index.php">Back</a>
        </div>
    </div>
    <?php
    }
    ?>
</head>
<body>
