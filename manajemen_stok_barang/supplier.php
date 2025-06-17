<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<h2>Data Supplier</h2>
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addSupplierModal">Tambah Supplier</button>

<!-- Supplier Table -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM Supplier";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['id_supplier'] ?></td>
            <td><?= $row['nama_supplier'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['telepon'] ?></td>
            <td>
                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Add Supplier Modal -->
<div class="modal fade" id="addSupplierModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="process/add_supplier.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Supplier</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Supplier</label>
                        <input type="text" name="nama_supplier" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Telepon</label>
                        <input type="text" name="telepon" class="form-control" required>
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