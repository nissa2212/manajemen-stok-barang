<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<h2>Laporan Transaksi</h2>

<form method="get">
    <label for="tanggal">Filter Tanggal:</label>
    <input type="date" id="tanggal" name="tanggal">
    <button type="submit">Filter</button>
</form>

<table>
    <tr>
        <th>ID Transaksi</th>
        <th>Tanggal</th>
        <th>Barang</th>
        <th>Jenis</th>
        <th>Jumlah</th>
    </tr>
    <?php
    $where = "";
    if (isset($_GET['tanggal'])) {
        $tanggal = $_GET['tanggal'];
        $where = "WHERE DATE(tanggal) = '$tanggal'";
    }
    
    $sql = "SELECT t.*, b.nama_barang 
            FROM transaksi t
            JOIN barang b ON t.id_barang = b.id_barang
            $where
            ORDER BY t.tanggal DESC";
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_transaksi'] . "</td>";
        echo "<td>" . $row['tanggal'] . "</td>";
        echo "<td>" . $row['nama_barang'] . "</td>";
        echo "<td>" . $row['jenis'] . "</td>";
        echo "<td>" . $row['jumlah'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php include 'includes/footer.php'; ?>