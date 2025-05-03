<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Profile.php';

session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: /tektn/view/pages/login/login.php");
    exit();
}

$profile = new Profile();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'edit':
            $_SESSION['edit_mode'] = true;
            break;
            
        case 'cancel':
            unset($_SESSION['edit_mode']);
            break;
    }
}

try {
    $user = $profile->getUserById($_SESSION['user_id']);
    
    if (!$user) {
        throw new Exception("User not found");
    }
    
    $_SESSION['user_data'] = $user;
    
} catch (Exception $e) {
    $_SESSION['error'] = "Error loading profile: " . $e->getMessage();
}

header("Location: /tektn/view/pages/profile/profile.php");
exit();
?>