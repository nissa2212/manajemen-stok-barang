<?php
include '../config/db.php';

$jenis = $_POST['jenis'];
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];

// Generate Transaction ID (TRX001, TRX002, ...)
$sql = "SELECT MAX(id_transaksi) AS max_id FROM Transaksi";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$next_id = "TRX" . str_pad((int)substr($row['max_id'], 3) + 1, 3, '0', STR_PAD_LEFT);

// Get current stock
$sql = "SELECT stok FROM Barang WHERE id_barang = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id_barang);
$stmt->execute();
$result = $stmt->get_result();
$barang = $result->fetch_assoc();
$stok_sekarang = $barang['stok'];

// Process transaction
if ($jenis == "PEMBELIAN") {
    $stok_baru = $stok_sekarang + $jumlah;
} else {
    // Check if stock is sufficient for sales
    if ($stok_sekarang < $jumlah) {
        die("Stok tidak mencukupi");
    }
    $stok_baru = $stok_sekarang - $jumlah;
}

// Update stock
$sql = "UPDATE Barang SET stok = ? WHERE id_barang = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $stok_baru, $id_barang);
$stmt->execute();

// Record transaction
$sql = "INSERT INTO Transaksi (id_transaksi, id_barang, jenis, jumlah, tanggal) 
        VALUES (?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $next_id, $id_barang, $jenis, $jumlah);
$stmt->execute();

header("Location: ../transaksi.php");
?>
