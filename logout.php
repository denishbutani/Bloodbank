<?php
// Start the session
session_start(); 

// Unset all session variables
$_SESSION = array();

// If the session uses cookies, invalidate the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 3600,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Unset specific session variable
unset($_SESSION['login']);

// Destroy the session
session_destroy(); 

// Redirect to the index page
header("Location: index.php"); 
exit();
?>
