<?php
$id = $_GET['id'];
$barang = $conn->query("SELECT * FROM data_barang WHERE id_barang=$id")->fetch_assoc();
?>

<h2>Edit Barang</h2>

<form method="POST" enctype="multipart/form-data">
    Nama: <input type="text" name="nama" value="<?= $barang['nama'] ?>"><br><br>
    Kategori: <input type="text" name="kategori" value="<?= $barang['kategori'] ?>"><br><br>
    Harga Beli: <input type="number" name="harga_beli" value="<?= $barang['harga_beli'] ?>"><br><br>
    Harga Jual: <input type="number" name="harga_jual" value="<?= $barang['harga_jual'] ?>"><br><br>
    Stok: <input type="number" name="stok" value="<?= $barang['stok'] ?>"><br><br>

    Gambar Baru: <input type="file" name="file_gambar"><br><br>

    <button type="submit">Update</button>
</form>

<?php
if ($_POST) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $beli = $_POST['harga_beli'];
    $jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    $gambar = $barang['gambar'];

    if ($_FILES['file_gambar']['error'] == 0) {
        $filename = time() . "_" . $_FILES['file_gambar']['name'];
        $target = "uploads/" . $filename;
        move_uploaded_file($_FILES['file_gambar']['tmp_name'], $target);
        $gambar = $target;
    }

    $sql = "UPDATE data_barang SET 
            nama='$nama', kategori='$kategori', harga_beli='$beli', harga_jual='$jual',
            stok='$stok', gambar='$gambar'
            WHERE id_barang=$id";

    $conn->query($sql);

    header("Location: index.php?page=user/list");
}
?>
