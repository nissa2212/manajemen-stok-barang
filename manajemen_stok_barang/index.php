<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<h2>Dashboard</h2>

<div class="info-boxes">
    <div class="info-box">
        <h3>Total Barang</h3>
        <?php
        $sql = "SELECT COUNT(*) AS total FROM barang";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo "<p>" . $row['total'] . "</p>";
        ?>
    </div>
    
    <div class="info-box">
        <h3>Total Supplier</h3>
        <?php
        $sql = "SELECT COUNT(*) AS total FROM supplier";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo "<p>" . $row['total'] . "</p>";
        ?>
    </div>
</div>

<h3>Transaksi Terakhir</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Barang</th>
        <th>Jenis</th>
        <th>Jumlah</th>
    </tr>
    <?php
    $sql = "SELECT t.*, b.nama_barang 
            FROM transaksi t
            JOIN barang b ON t.id_barang = b.id_barang
            ORDER BY t.tanggal DESC LIMIT 5";
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