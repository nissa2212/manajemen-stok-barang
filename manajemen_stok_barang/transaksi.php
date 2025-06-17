<?php 
include 'includes/header.php'; 
include 'config/db.php'; // Pastikan koneksi tersedia sebelum query
?>

<h2>Transaksi</h2>
<div class="row">
    <div class="col-md-6">
        <form action="process/transaksi.php" method="POST">
            
            <!-- Jenis Transaksi -->
            <div class="mb-3">
                <label>Jenis Transaksi</label>
                <select name="jenis" class="form-control" required>
                    <option value="PEMBELIAN">Pembelian</option>
                    <option value="PENJUALAN">Penjualan</option>
                </select>
            </div>
            
            <!-- Barang -->
            <div class="mb-3">
                <label>Barang</label>
                <select name="id_barang" class="form-control" required>
                    <option value="">Pilih Barang</option>
                    <?php
                    $sql = "SELECT id_barang, nama_barang FROM Barang";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id_barang'] . "'>" . $row['nama_barang'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Jumlah -->
            <div class="mb-3">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required min="1">
            </div>

            <button type="submit" class="btn btn-primary">Proses</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
