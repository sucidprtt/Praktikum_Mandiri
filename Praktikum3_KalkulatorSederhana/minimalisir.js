function calculate() {
    // Mendapatkan nilai dari input dan operasi
    var number1 = parseFloat(document.getElementById("number1").value);
    var number2 = parseFloat(document.getElementById("number2").value);
    var operation = document.getElementById("operation").value;

    // Variabel untuk menyimpan hasil perhitungan
    var result;

    // Melakukan perhitungan berdasarkan operasi yang dipilih
    switch(operation) {
        case 'tambah':
            result = number1 + number2;
            break;
        case 'kurang':
            result = number1 - number2;
            break;
        case 'kali':
            result = number1 * number2;
            break;
        case 'bagi':
            if (number2 !== 0) {
                result = number1 / number2;
            } else {
                result = "Error: Division by zero";
            }
            break;
        default:
            result = "Error: Invalid operation";
    }

    // Menampilkan hasil perhitungan di elemen dengan id "result"
    document.getElementById("result").innerHTML = "Hasil Hitung: " + result;
}