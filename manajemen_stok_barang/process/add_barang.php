<?php
include '../config/db.php';

$nama = $_POST['nama_barang'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];

// Validasi sederhana
if ($harga_jual <= $harga_beli) {
    die("Harga jual harus lebih besar dari harga beli");
}

$sql = "INSERT INTO barang (nama_barang, harga_beli, harga_jual, stok) 
        VALUES ('$nama', $harga_beli, $harga_jual, $stok)";

if (mysqli_query($conn, $sql)) {
    header("Location: ../barang.php?status=sukses");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>