<?php
include '../config/db.php';

$nama = $_POST['nama_supplier'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

// Generate ID (SUP001, SUP002, ...)
$sql = "SELECT MAX(id_supplier) AS max_id FROM Supplier";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$next_id = "SUP" . str_pad((int)substr($row['max_id'], 3) + 1, 3, '0', STR_PAD_LEFT);

// Insert
$stmt = $conn->prepare("INSERT INTO Supplier (id_supplier, nama_supplier, alamat, telepon) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $next_id, $nama, $alamat, $telepon);
$stmt->execute();

// Redirect ke halaman supplier (di sini CSS aktif di supplier.php)
header("Location: ../supplier.php");
exit;
?>
