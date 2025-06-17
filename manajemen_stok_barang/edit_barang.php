<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<h2>Edit Barang</h2>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM barang WHERE id_barang = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<form action="process/update_barang.php" method="post">
    <input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
    
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
    
    <label for="harga_beli">Harga Beli:</label>
    <input type="number" id="harga_beli" name="harga_beli" min="0" value="<?php echo $row['harga_beli']; ?>" required>
    
    <label for="harga_jual">Harga Jual:</label>
    <input type="number" id="harga_jual" name="harga_jual" min="0" value="<?php echo $row['harga_jual']; ?>" required>
    
    <label for="stok">Stok:</label>
    <input type="number" id="stok" name="stok" min="0" value="<?php echo $row['stok']; ?>" required>
    
    <button type="submit">Update Barang</button>
    <a href="barang.php" class="btn">Kembali</a>
</form>

<?php include 'includes/footer.php'; ?>