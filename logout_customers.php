<?php
session_start();

// Hapus semua data sesi
session_unset();

// Hapus sesi cookie jika ada
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman utama setelah logout
header("Location: login_customers.php"); // Ganti dengan halaman yang sesuai
exit();
