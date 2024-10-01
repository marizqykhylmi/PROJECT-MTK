<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuitas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- HEADER -->
    <header>
    <div class="logo">
        <a href="index.php">
            <img src="wikrama-logo.png" alt="Logo" width="50" height="50">
        </a>
    </div>
    <h1>Perhitungan Bunga & Anuitas</h1>
    <a href="index.php">
    <svg xmlns="http://www.w3.org/2000/svg" height="32" width="36" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
    </a>
</header>


    
    <div class="container">
    <h2>Anuitas</h2>
<form method="post">
    <label for="M">Modal (M):</label><br>
    <input type="number" id="M" name="M" required><br><br>

    <label for="b">Suku Bunga (b):</label><br>
    <input type="number" id="b" name="b" step="0.01" required><br><br>

    <!-- Pilihan Periode -->
    <label for="periode">Pilih Periode:</label><br>
    <select id="periode" name="periode" onchange="showPeriodInput()" required>
        <option value="">--Pilih--</option>
        <option value="triwulan">Triwulan (3 bulan)</option>
        <option value="caturwulan">Caturwulan (4 bulan)</option>
        <option value="semester">Semester (6 bulan)</option>
        <option value="tahun">Tahun</option>
    </select><br><br>

    <!-- Input jumlah periode (dinamis berdasarkan pilihan) -->
    <div id="periodeInput" style="display:none;">
        <label for="t">Jumlah Periode (dalam bulan/tahun):</label><br>
        <input type="number" id="t" name="t" min="1"><br><br>
    </div>

    <input type="submit" value="Hitung">
</form>

<script>
    function showPeriodInput() {
        var periode = document.getElementById("periode").value;
        var periodeInput = document.getElementById("periodeInput");
        
        if (periode !== "") {
            periodeInput.style.display = "block";
        } else {
            periodeInput.style.display = "none";
        }
    }
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $M = $_POST['M'];
    $b = $_POST['b'] / 100;
    $periode = $_POST['periode'];
    $t = $_POST['t'];

    // Konversi periode berdasarkan pilihan
    if ($periode == "triwulan") {
        $periode_tahun = 3 / 12; // Triwulan = 3 bulan
        $total_periode = $t / 3; // Total periode dalam triwulan
    } elseif ($periode == "caturwulan") {
        $periode_tahun = 4 / 12; // Caturwulan = 4 bulan
        $total_periode = $t / 4; // Total periode dalam caturwulan
    } elseif ($periode == "semester") {
        $periode_tahun = 6 / 12; // Semester = 6 bulan
        $total_periode = $t / 6; // Total periode dalam semester
    } elseif ($periode == "tahun") {
        $periode_tahun = 1; // Tahun = 12 bulan
        $total_periode = $t; // Total periode dalam tahun
    }

    // Perhitungan anuitas
    $A = $M * ($b / (1 - pow(1 + $b, -$total_periode)));

    echo "<h3>Hasil Perhitungan:</h3>";
    echo "<p>Anuitas (A): Rp " . number_format($A, 2) . "</p>";

    echo "<h3>Tabel Angsuran</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Periode</th><th>Pokok</th><th>Bunga</th><th>Cicilan</th></tr>";

    $sisa = $M;
    for ($i = 1; $i <= $total_periode; $i++) {
        $bunga = $sisa * $b * $periode_tahun;
        $pokok = $A - $bunga;
        $sisa -= $pokok;

        echo "<tr><td>$i</td><td>Rp " . number_format($pokok, 2) . "</td><td>Rp " . number_format($bunga, 2) . "</td><td>Rp " . number_format($A, 2) . "</td></tr>";
    }
    echo "</table>";
}
?>


    </div>
    <!-- FOOTER -->
    <footer>
        <p>&copy; 2024 Project Matematika Bunga & Anuitas | M. Arizqy Khylmi Alkazhia</p>
    </footer>
</body>
</html>
