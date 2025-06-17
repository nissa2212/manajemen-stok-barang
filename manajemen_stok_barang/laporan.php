<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<h2>Laporan Transaksi</h2>

<div class="row mb-3">
    <div class="col-md-4">
        <form method="GET">
            <div class="input-group">
                <input type="date" name="tanggal" class="form-control">
                <button class="btn btn-primary" type="submit">Filter</button>
            </div>
        </form>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Jenis</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $where = "";
        if (isset($_GET['tanggal'])) {
            $tanggal = $_GET['tanggal'];
            $where = "WHERE DATE(tanggal) = '$tanggal'";
        }
        
        $sql = "SELECT t.*, b.nama_barang 
                FROM Transaksi t
                JOIN Barang b ON t.id_barang = b.id_barang
                $where
                ORDER BY t.tanggal DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['id_transaksi'] ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['jenis'] ?></td>
            <td><?= $row['jumlah'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'includes/footer.php'; ?>