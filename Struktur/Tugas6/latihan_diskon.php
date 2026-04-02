<!DOCTYPE html>
<html>
<head>
    <title>Diskon Pembayaran UKT</title>
</head>
<body>

<h2>Form Pembayaran UKT Mahasiswa</h2>

<form method="post">
    NPM: <input type="text" name="npm" required><br><br>
    Nama: <input type="text" name="nama" required><br><br>
    Prodi: <input type="text" name="prodi" required><br><br>
    Semester: <input type="number" name="semester" required><br><br>
    Biaya UKT (Rp): <input type="number" name="ukt" required><br><br>
    
    <input type="submit" name="submit" value="Hitung">
</form>

<?php
if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $ukt = $_POST['ukt'];

    $diskon = 0;

    // Logika diskon
    if ($ukt >= 5000000) {
        $diskon = 0.10;

        if ($semester > 8) {
            $diskon = 0.15;
        }
    }

    $jumlah_diskon = $ukt * $diskon;
    $total_bayar = $ukt - $jumlah_diskon;

    echo "<h3>Hasil Perhitungan</h3>";
    echo "NPM: $npm <br>";
    echo "Nama: $nama <br>";
    echo "Prodi: $prodi <br>";
    echo "Semester: $semester <br>";
    echo "Biaya UKT: Rp " . number_format($ukt, 0, ',', '.') . "<br>";
    echo "Diskon: " . ($diskon * 100) . "%<br>";
    echo "Potongan: Rp " . number_format($jumlah_diskon, 0, ',', '.') . "<br>";
    echo "<b>Total Bayar: Rp " . number_format($total_bayar, 0, ',', '.') . "</b>";
}
?>

</body>
</html>