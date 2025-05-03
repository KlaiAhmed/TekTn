<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Profile.php';

session_start();
if (
    empty($_SESSION['logged_in']) ||!isset($_SESSION['role']) ||$_SESSION['role'] !== 'admin') {
    header("Location: /tektn/view/pages/login/login.php");
    exit();
}



$profile = new Profile();
$search = trim($_GET['search'] ?? '');


if (isset($_GET['delete'])) {
    try {
        $profile->deleteAdmin((int)$_GET['delete']);
        $_SESSION['success'] = "Admin privileges removed.";
    } catch (Exception $e) {
        $_SESSION['error'] = "Could not remove admin: {$e->getMessage()}";
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    try {
        $profile->updateAdmin(
            (int)$_POST['user_id'],
            [
                'username'    => trim($_POST['username']),
                'email'       => trim($_POST['email']),
                'mobile'      => trim($_POST['mobile']),
                'admin_since' => trim($_POST['admin_since']),
            ]
        );
        $_SESSION['success'] = "Admin updated successfully.";
    } catch (Exception $e) {
        $_SESSION['error'] = "Update failed: {$e->getMessage()}";
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}


try {
    $admins = $profile->getAdminUsers($search);
} catch (Exception $e) {
    $_SESSION['error'] = "Error loading admins: {$e->getMessage()}";
    $admins = [];
}


include __DIR__ . '/../view/pages/dashboard/admin_table/admin.php';
unset($_SESSION['error'], $_SESSION['success']);
?>