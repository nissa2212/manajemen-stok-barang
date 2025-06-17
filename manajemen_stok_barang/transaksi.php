<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<h2>Transaksi</h2>

<form action="process/transaksi.php" method="post">
    <label for="jenis">Jenis Transaksi:</label>
    <select id="jenis" name="jenis" required>
        <option value="PEMBELIAN">Pembelian</option>
        <option value="PENJUALAN">Penjualan</option>
    </select>
    
    <label for="id_barang">Barang:</label>
    <select id="id_barang" name="id_barang" required>
        <option value="">Pilih Barang</option>
        <?php
        $sql = "SELECT id_barang, nama_barang FROM barang";
        $result = mysqli_query($conn, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['id_barang'] . "'>" . $row['nama_barang'] . "</option>";
        }
        ?>
    </select>
    
    <label for="jumlah">Jumlah:</label>
    <input type="number" id="jumlah" name="jumlah" min="1" required>
    
    <button type="submit">Proses Transaksi</button>
</form>

<?php include 'includes/footer.php'; ?>