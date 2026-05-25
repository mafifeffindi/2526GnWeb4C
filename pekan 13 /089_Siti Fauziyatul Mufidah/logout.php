<?php
session_start();

// Bersihkan semua data session
session_unset();

// Hancurkan session
session_destroy();

// Pindahkan user kembali ke halaman login
header("Location: login.php");
exit;
?>