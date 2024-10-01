<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bunga Majemuk</title>
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
        <h1>Bunga Majemuk - Modal Akhir</h1>
        <form method="post">
            <label for="M">Modal (M):</label><br>
            <input type="number" id="M" name="M" required><br><br>

            <label for="b">Suku Bunga (b):</label><br>
            <input type="number" id="b" name="b" step="0.01" required><br><br>

            <label for="t">Tahun (t):</label><br>
            <input type="number" id="t" name="t" required><br><br>

            <input type="submit" value="Hitung">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $M = $_POST['M'];
            $b = $_POST['b'] / 100; // Konversi ke desimal
            $t = $_POST['t'];

            // Perhitungan Bunga Majemuk
            $Mn = $M * pow((1 + $b), $t);

            echo "<h2>Hasil Perhitungan:</h2>";
            echo "<p>Modal Akhir (Mn): Rp " . number_format($Mn, 2) . "</p>";
        }
        ?>
    </div>
    <!-- FOOTER -->
    <footer>
    <p>&copy; 2024 Project Matematika Bunga & Anuitas | M. Arizqy Khylmi Alkazhia</p>
    </footer>
</body>
</html>
