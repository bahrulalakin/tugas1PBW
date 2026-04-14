<?php include 'menu.php'; ?>

<h3>Soal 1 - Jenis Kendaraan</h3>

<form method="post">
    Masukkan jumlah roda:
    <input type="number" name="roda" required>
    <button type="submit">Cek</button>
</form>

<?php
if (isset($_POST['roda'])) {
    $roda = $_POST['roda'];

    switch ($roda) {
        case 2:
            echo "Sepeda Motor";
            break;
        case 3:
            echo "Bajaj";
            break;
        case 4:
            echo "Mobil";
            break;
        default:
            echo "Jenis kendaraan tidak diketahui";
    }
}
?>