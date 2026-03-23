<!DOCTYPE html>
<html>
<head>
    <title>Latihan Nilai</title>
</head>
<body>

<h2>Input Nilai Mahasiswa</h2>

<form method="post" action="">
    Nama: <input type="text" name="nama"><br><br>
    Nilai: <input type="number" name="nilai"><br><br>
    <input type="submit" value="Proses">
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['nama'];
    $nilai = $_POST['nilai'];

    // Validasi sederhana
    if ($nilai < 0 || $nilai > 100) {
        $predikat = "Tidak valid";
    } 
    elseif ($nilai >= 85) {
        $predikat = "A";
    } 
    elseif ($nilai >= 75) {
        $predikat = "B";
    } 
    elseif ($nilai >= 65) {
        $predikat = "C";
    } 
    elseif ($nilai >= 50) {
        $predikat = "D";
    } 
    else {
        $predikat = "E";
    }

    echo "<h3>Hasil:</h3>";
    echo "Nama: " . $nama . "<br>";
    echo "Nilai: " . $nilai . "<br>";
    echo "Predikat: " . $predikat;
}
?>

</body>
</html>