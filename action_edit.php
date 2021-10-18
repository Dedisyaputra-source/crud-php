<?php
require_once('connection.php');


if (isset($_POST['nomorbarang'])) $noBarang = $_POST['nomorbarang'];
else {
    echo 'Nomor Barang tidak ditemukan <a href= "index.php">Kembali</a>';
    exit();
}
$queryEdit = "SELECT * FROM barang WHERE no_barang = '{$noBarang}'";

$result = mysqli_query($mysqli, $queryEdit);

foreach ($result as $barang) {
    $namaBarang = $barang['nama_barang'];
    $stokBarang = $barang['stok'];
    $hargaBarang = $barang['harga'];
}

if (isset($_POST['namabarang'])) $nameBarang = $_POST['namabarang'];

if (isset($_POST['stokbarang'])) $stokBarang = $_POST['stokbarang'];

if (isset($_POST['hargabarang'])) $hargaBarang = $_POST['hargabarang'];

$queryUpdate = "
    UPDATE barang SET 
        nama_barang ='{$nameBarang}',
        stok = '{$stokBarang}',
        harga = '{$hargaBarang}', 
    WHERE no_barang = '{$noBarang}'; 
";

$insert = mysqli_query($mysqli, $queryUpdate);

if ($insert == false) {
    echo 'error dalam update data <a href="form_edit.php">Kembali</a>';
} else {
    header('Location: index.php');
}
