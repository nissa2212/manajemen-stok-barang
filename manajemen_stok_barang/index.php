<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<h2>Dashboard</h2>

<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Barang</div>
            <div class="card-body">
                <h4 class="card-title">
                    <?php
                    $sql = "SELECT COUNT(*) AS total FROM Barang";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['total'];
                    ?>
                </h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Total Supplier</div>
            <div class="card-body">
                <h4 class="card-title">
                    <?php
                    $sql = "SELECT COUNT(*) AS total FROM Supplier";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['total'];
                    ?>
                </h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-header">Transaksi Hari Ini</div>
            <div class="card-body">
                <h4 class="card-title">
                    <?php
                    $sql = "SELECT COUNT(*) AS total FROM Transaksi WHERE DATE(tanggal) = CURDATE()";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['total'];
                    ?>
                </h4>
            </div>
        </div>
    </div>
</div>

<h3 class="mt-4">Transaksi Terakhir</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Jenis</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT t.*, b.nama_barang 
                FROM Transaksi t
                JOIN Barang b ON t.id_barang = b.id_barang
                ORDER BY t.tanggal DESC LIMIT 5";
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