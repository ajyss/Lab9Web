<?php
require "config/database.php";

$page = isset($_GET['page']) ? $_GET['page'] : "dashboard";

require "views/header.php";

$path = "modules/" . $page . ".php";

if (file_exists($path)) {
    require $path;
} else {
    echo "<h2>Halaman tidak ditemukan!</h2>";
}

require "views/footer.php";
?>
