<?php
require_once 'auth.php';

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Expire the session cookie immediately (if set via cookies)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"] ?? false, $params["httponly"] ?? true
    );
}

// Redirect to login
header('Location: login.php');
exit;
