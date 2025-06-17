<?php
include '../config/db.php';

$nama = $_POST['nama_barang'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];

// Generate ID (BRG001, BRG002, ...)
$sql = "SELECT MAX(id_barang) AS max_id FROM Barang";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$next_id = "BRG" . str_pad((int)substr($row['max_id'], 3) + 1, 3, '0', STR_PAD_LEFT);

$stmt = $conn->prepare("INSERT INTO Barang (id_barang, nama_barang, harga_beli, harga_jual) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssdd", $next_id, $nama, $harga_beli, $harga_jual);
$stmt->execute();

header("Location: ../barang.php");
?>
