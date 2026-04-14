<?php include 'menu.php'; ?>

<h3>Soal 4 - Genap atau Ganjil</h3>

<form method="post">
    Masukkan angka:
    <input type="number" name="angka" 
        value="<?php echo isset($_POST['angka']) ? $_POST['angka'] : ''; ?>" required>
    <button type="submit">Cek</button>
</form>

<?php
if (isset($_POST['angka'])) {
    $angka = $_POST['angka'];
    $hasil = ($angka % 2 == 0) ? "Genap" : "Ganjil";

    echo "Angka yang diinput: $angka <br>";
    echo "Hasil: $hasil";
}
?>