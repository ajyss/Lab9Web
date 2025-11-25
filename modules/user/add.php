<h2>Tambah Barang</h2>

<form method="POST" enctype="multipart/form-data">
    Nama: <input type="text" name="nama"><br><br>
    Kategori: <input type="text" name="kategori"><br><br>
    Harga Beli: <input type="number" name="harga_beli"><br><br>
    Harga Jual: <input type="number" name="harga_jual"><br><br>
    Stok: <input type="number" name="stok"><br><br>
    Gambar: <input type="file" name="file_gambar"><br><br>

    <button type="submit">Simpan</button>
</form>

<?php
if ($_POST) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $beli = $_POST['harga_beli'];
    $jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    $filename = time() . "_" . $_FILES['file_gambar']['name'];
    $target = "uploads/" . $filename;
    move_uploaded_file($_FILES['file_gambar']['tmp_name'], $target);

    $sql = "INSERT INTO data_barang (nama,kategori,harga_beli,harga_jual,stok,gambar) 
            VALUES ('$nama','$kategori','$beli','$jual','$stok','$target')";
    $conn->query($sql);

    header("Location: index.php?page=user/list");
}
?>
