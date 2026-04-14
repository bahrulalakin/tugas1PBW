<?php include 'menu.php'; ?>

<h3>Soal 3 - Daftar Hewan</h3>

<form method="post">
    Hewan 1: <input type="text" name="h1" required><br>
    Hewan 2: <input type="text" name="h2" required><br>
    Hewan 3: <input type="text" name="h3" required><br>
    Hewan 4: <input type="text" name="h4" required><br>
    Hewan 5: <input type="text" name="h5" required><br><br>
    
    <button type="submit" name="tampil">Tampilkan</button>
</form>

<?php
if (isset($_POST['tampil'])) {

    $hewan = [
        $_POST['h1'],
        $_POST['h2'],
        $_POST['h3'],
        $_POST['h4'],
        $_POST['h5']
    ];

    echo "Daftar Hewan:<br>";
    foreach ($hewan as $h) {
        echo $h . "<br>";
    }
}
?>