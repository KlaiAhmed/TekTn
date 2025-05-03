<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/profile.php';

session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: /tektn/view/pages/login/login.php");
    exit();
}


$profile = new Profile();
$userId = $_SESSION['user_id'];
$error = null;

try {
    $updateData = [
        'username' => trim($_POST['username']),
        'email' => trim($_POST['email']),
        'mobile' => trim($_POST['mobile'])
    ];

    if (empty($updateData['username']) || empty($updateData['email'])) {
        throw new Exception("Username and email are required");
    }

    if (!filter_var($updateData['email'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email format");
    }

    if (!empty($updateData['mobile']) && !preg_match('/^\+[0-9]{11}$/', $updateData['mobile'])) {
        throw new Exception("Mobile must be in +216XXXXXXXX format");
    }

    if (!empty($_POST['password'])) {
        if ($_POST['password'] !== $_POST['confirm_password']) {
            throw new Exception("Passwords do not match");
        }
        
        if (strlen($_POST['password']) < 8) {
            throw new Exception("Password must be at least 8 characters");
        }
        
        $updateData['password'] = $_POST['password'];
    }

    if ($profile->updateProfile($userId, $updateData)) {
        $_SESSION['user_data'] = $profile->getUserById($userId);
        $_SESSION['success'] = "Profile updated successfully!";
        unset($_SESSION['edit_mode']);
    } else {
        throw new Exception("Failed to update profile");
    }

} catch (Exception $e) {
    $error = $e->getMessage();
    $_SESSION['error'] = $error;
    $_SESSION['form_data'] = $updateData;
}

header("Location: /tektn/view/pages/profile/profile.php");
exit();
?>