<?php
include '../config/db.php';

$id = $_POST['id_barang'];
$nama = $_POST['nama_barang'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];

// Validasi sederhana
if ($harga_jual <= $harga_beli) {
    die("Harga jual harus lebih besar dari harga beli");
}

$sql = "UPDATE barang SET 
        nama_barang = '$nama',
        harga_beli = $harga_beli,
        harga_jual = $harga_jual,
        stok = $stok
        WHERE id_barang = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: ../barang.php?status=sukses_edit");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>