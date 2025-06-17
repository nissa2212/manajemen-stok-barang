<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<h2>Data Barang</h2>
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBarangModal">Tambah Barang</button>

<!-- Product Table -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM Barang";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['id_barang'] ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.') ?></td>
            <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.') ?></td>
            <td><?= $row['stok'] ?></td>
            <td>
                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Add Product Modal -->
<div class="modal fade" id="addBarangModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="process/add_barang.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga Beli</label>
                        <input type="number" name="harga_beli" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga Jual</label>
                        <input type="number" name="harga_jual" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
