<?php
// Mulai session
session_start();

// Hapus semua data session
session_destroy();

// Kembali ke halaman login
header("location: login.php");
exit;
?>
