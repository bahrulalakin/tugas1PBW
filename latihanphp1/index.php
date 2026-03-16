<?php
echo "Hello World" . "<br>";
?>

<?php
$nama = "bahrul alakin";
$umur = 20;

echo "nama : " . $nama. "<br>";
echo "umur : " . $umur. "<br>";

echo "nama Saya adalah ". $nama. "<br>";
echo "umur saya " . $umur."<br>";
?>

<?php
define("SITE_NAME", "unsika.ac.id");
define("VERSION", "1.0");

echo "Selamat datang di " . SITE_NAME . "<br>";
echo "Versi Sistem: " . VERSION . "<br>";
?>

<?php
$buah = ["apel","jeruk","semangka"];
echo $buah[0]. "<br>";
?>

<?php
class Mahasiswa {
public $nama;
public function sapa() {
return "Halo, saya $this->nama";
}
}
$mhs = new Mahasiswa();
$mhs->nama = "Jeni";
echo $mhs->sapa();
?>