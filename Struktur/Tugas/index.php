<?php

define("Pajak",0.10);

$namabarang = ["keyboard","mouse","monitor"];
$harga = ["150000","200000","300000"];
$jumlahbeli = 2;
$total = $harga[0] * $jumlahbeli;
$pajak = $total * Pajak;
$totalakhir = $total + $pajak;

echo " Nama Barang : ". $namabarang[0]. "<br>";
echo " Harga Satuan : ". $harga[0]. "<br>";
echo " Jumlah Beli : ". $jumlahbeli . "<br>";
echo " Total Harga sebelum pajak : ". $total. "<br>";
echo " Pajak : ". $pajak. "<br>";
echo " Total Bayar : ". $totalakhir;

