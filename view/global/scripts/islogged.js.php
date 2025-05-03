<?php
session_start();
header('Content-Type: application/javascript');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
?>
const isLogged = <?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'true' : 'false'; ?>;
const isadmin = <?php echo isset($_SESSION['role']) && $_SESSION['role'] === "admin" ? 'true' : 'false'; ?>;