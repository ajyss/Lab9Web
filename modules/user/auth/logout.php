<?php
session_start();

// Hapus semua session
session_unset();
session_destroy();

// Jika menggunakan cookie login, hapus juga
if (isset($_COOKIE['user'])) {
    setcookie('user', '', time() - 3600, '/');
}

// Redirect ke halaman login
header("Location: index.php?page=auth/login");
exit;
?>
