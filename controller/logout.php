<?php
session_start();
$_SESSION = array();
session_destroy();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Location: /tektn/view/index.php?logout=success");
exit();
?>