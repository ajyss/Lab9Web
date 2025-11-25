<h2>Data Barang</h2>

<a href="index.php?page=user/add" class="btn">+ Tambah Barang</a>
<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Harga Jual</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM data_barang ORDER BY id_barang DESC");

while ($row = $result->fetch_assoc()):
?>
<tr>
    <td><img src="<?= $row['gambar'] ?>" width="80"></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['kategori'] ?></td>
    <td><?= number_format($row['harga_jual']) ?></td>
    <td><?= $row['stok'] ?></td>
    <td>
        <a href="index.php?page=user/edit&id=<?= $row['id_barang'] ?>">Edit</a> |
        <a href="index.php?page=user/delete&id=<?= $row['id_barang'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
