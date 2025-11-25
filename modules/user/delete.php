<?php
$id = $_GET['id'];
$conn->query("DELETE FROM data_barang WHERE id_barang=$id");
header("Location: index.php?page=user/list");
?>
