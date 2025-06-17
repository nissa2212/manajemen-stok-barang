<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<h2>Data Supplier</h2>

<!-- Form Tambah Supplier -->
<form action="process/add_supplier.php" method="post">
    <h3>Tambah Supplier Baru</h3>
    <label for="nama_supplier">Nama Supplier:</label>
    <input type="text" id="nama_supplier" name="nama_supplier" required>
    
    <label for="alamat">Alamat:</label>
    <textarea id="alamat" name="alamat" required></textarea>
    
    <label for="telepon">Telepon:</label>
    <input type="text" id="telepon" name="telepon" required>
    
    <button type="submit">Tambah Supplier</button>
</form>

<!-- Tabel Daftar Supplier -->
<table>
    <tr>
        <th>ID</th>
        <th>Nama Supplier</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
    <?php
    $sql = "SELECT * FROM supplier";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_supplier'] . "</td>";
            echo "<td>" . $row['nama_supplier'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td>" . $row['telepon'] . "</td>";
            echo "<td>
                    <a href='edit_supplier.php?id=" . $row['id_supplier'] . "' class='btn btn-warning'>Edit</a>
                    <a href='process/delete_supplier.php?id=" . $row['id_supplier'] . "' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data supplier</td></tr>";
    }
    ?>
</table>

<?php include 'includes/footer.php'; ?>