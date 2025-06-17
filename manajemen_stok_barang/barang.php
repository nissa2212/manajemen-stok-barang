<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<h2>Data Barang</h2>

<!-- Form Tambah Barang -->
<form action="process/add_barang.php" method="post">
    <h3>Tambah Barang Baru</h3>
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" id="nama_barang" name="nama_barang" required>
    
    <label for="harga_beli">Harga Beli:</label>
    <input type="number" id="harga_beli" name="harga_beli" min="0" required>
    
    <label for="harga_jual">Harga Jual:</label>
    <input type="number" id="harga_jual" name="harga_jual" min="0" required>
    
    <label for="stok">Stok:</label>
    <input type="number" id="stok" name="stok" min="0" required>
    
    <button type="submit">Tambah Barang</button>
</form>

<!-- Tabel Daftar Barang -->
<table>
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    <?php
    $sql = "SELECT * FROM barang ORDER BY nama_barang";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_barang'] . "</td>";
            echo "<td>" . $row['nama_barang'] . "</td>";
            echo "<td>Rp " . number_format($row['harga_beli'], 0, ',', '.') . "</td>";
            echo "<td>Rp " . number_format($row['harga_jual'], 0, ',', '.') . "</td>";
            echo "<td>" . $row['stok'] . "</td>";
            echo "<td>
                    <a href='edit_barang.php?id=" . $row['id_barang'] . "' class='btn btn-warning'>Edit</a>
                    <a href='process/delete_barang.php?id=" . $row['id_barang'] . "' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data barang</td></tr>";
    }
    ?>
</table>

<?php include 'includes/footer.php'; ?>